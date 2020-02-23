<?php

namespace SpkApp\Http\Controllers\Datatable;

use SpkApp\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpkApp\Penilaian;
use SpkApp\Kriteria;
use Datatables;
use Session;
use DB;

class PenilaianController extends Controller
{
    public function me(Request $request)
    {
        $spk_id = $request->input('id_spk');
        $kriterias = Kriteria::where('spk_id', $spk_id)->get();

        $sub = Penilaian::leftJoin(
                'alternatif', 'alternatif.id', 'penilaian.alternatif_id'
        )
        ->leftJoin('spk', 'spk.id', 'alternatif.spk_id')
        ->leftJoin('sub_kriteria', 'sub_kriteria.id', 'penilaian.sub_kriteria_id')
        ->leftJoin('kriteria', 'kriteria.id', 'sub_kriteria.kriteria_id')
        ->select(
            'alternatif_id',
            DB::raw('spk.nama AS nama_spk'),
            DB::raw('alternatif.nama AS nama_alternatif'),
            DB::raw('kriteria.id AS kriteria_id'),
            DB::raw('sub_kriteria.nama AS nama_sub_kriteria'),
            DB::raw('sub_kriteria.nilai AS nilai_sub_kriteria')
        );

        $penilaian = DB::table(
            DB::raw("({$sub->toSql()}) as sub")
        )
        ->mergeBindings($sub->getQuery())
        ->select(
            'nama_spk',
            'nama_alternatif'
        );

        foreach ($kriterias as $kriteria) {
            $penilaian->addSelect(
                DB::raw('MAX(CASE WHEN kriteria_id = ' . $kriteria->id . ' THEN nama_sub_kriteria END) AS ' . strtolower($kriteria->nama) . '_label'),
                DB::raw('SUM(COALESCE(CASE WHEN kriteria_id = ' . $kriteria->id . ' THEN nilai_sub_kriteria END, 0))' . strtolower($kriteria->nama) . '_nilai'),
                // DB::raw(
                //     'CASE
                //         WHEN kriteria_id = ' . $kriteria->id . ' AND nama_sub_kriteria IS NULL
                //         THEN SUM(COALESCE(nilai_sub_kriteria, 0))
                //         ELSE MAX(nama_sub_kriteria)
                //     END AS ' . strtolower($kriteria->nama)
                // )
            );
        }

        $penilaian->groupBy('alternatif_id');
        
        return Datatables::of($penilaian->get())
            ->addIndexColumn()
            // ->editColumn('nama_spk', function($alternatif) {
            //     return $alternatif->spk->nama;
            // })
            // ->addColumn('aksi', function($alternatif) {
            //     return view('datatable.action', ['name' => 'alternatif', 'data' => $alternatif])->render();
            // })
            // ->rawColumns(['aksi'])
            ->make(true);
    }
}
