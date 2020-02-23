<?php

namespace SpkApp\Http\Controllers\Datatable;

use SpkApp\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpkApp\Alternatif;
use Datatables;
use Session;

class AlternatifController extends Controller
{
    public function me(Request $request)
    {
        $spk_id = $request->input('id_spk');
        $alternatif = Alternatif::with('spk')->where('spk_id', $spk_id)->get();
        return Datatables::of($alternatif)
            ->addIndexColumn()
            ->editColumn('nama_spk', function($alternatif) {
                return $alternatif->spk->nama;
            })
            ->addColumn('aksi', function($alternatif) {
                return view('datatable.action', ['name' => 'alternatif', 'data' => $alternatif])->render();
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
