<?php

namespace SpkApp\Http\Controllers\Datatable;

use SpkApp\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpkApp\Spk;
use Datatables;
use Session;

class SpkController extends Controller
{
	public function me()
	{
        $spk = Spk::with('jenisBobot')->orderBy('created_at', 'desc')->get();
        return Datatables::of($spk)
            ->addIndexColumn()
            ->editColumn('jenis_bobot', function($spk) {
                return $spk->jenisBobot->nama;
            })
            ->addColumn('aksi', function($spk) {
                return view('datatable.action', ['name' => 'spk', 'data' => $spk])->render();
            })
            ->rawColumns(['aksi'])
            ->make(true);
	}
}
