<?php

namespace SpkApp\Http\Controllers\Datatable;

use SpkApp\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpkApp\Kriteria;
use Datatables;
use Session;

class KriteriaController extends Controller
{
    public function me(Request $request)
    {
        $spk_id = $request->input('id_spk');
        $kriteria = Kriteria::with('spk', 'subKriteria')->where('spk_id', $spk_id)->get();
        return Datatables::of($kriteria)
            ->addIndexColumn()
            ->addColumn('nama_spk', function($kriteria) {
                return $kriteria->spk->nama;
            })
            ->addColumn('sub_kriteria_detail', function($kriteria) {
                $view = "<ol>";
                foreach ($kriteria->subKriteria as $sub_kriteria) {
                    $view .= "<li>" . $sub_kriteria->nama . "</li>";
                }
                $view .= "</ol>";

                return $view;
            })
            ->addColumn('aksi', function($kriteria) {
                return view('datatable.action', ['name' => 'kriteria', 'data' => $kriteria])->render();
            })
            ->rawColumns(['sub_kriteria_detail', 'aksi'])
            ->make(true);
    }
}
