<?php

namespace SpkApp\Http\Controllers;

use Illuminate\Http\Request;
use SpkApp\Alternatif;
use SpkApp\Spk;
use SpkApp\Http\Requests\AlternatifRequest;
use Session;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function index(Request $request)
    {
        // dd(Spk::find($request->input('id_spk'))->alternatif);
        $list_spk = Spk::pluck('nama', 'id');
        $spk_id = $request->input('id_spk');
        $alternatifs = [];

        if ($spk_id) {
            $alternatifs = Alternatif::where('spk_id', $spk_id)->get();
        }
        return view('alternatif.index', compact('alternatifs', 'list_spk', 'spk_id'));
    }

    public function create(Request $request)
    {
        $spk_id = $request->input('id_spk');
        if (!$spk_id) {
            return redirect()->route('alternatif.index');
        }

        $spk = Spk::find($spk_id);
        return view('alternatif.create', compact('spk'));
    }

    public function store(AlternatifRequest $request)
    {
        $alternatif = Alternatif::create($request->all());
        Session::flash('flash_message', 'Berhasil Tambah Data');

        return redirect()->route('alternatif.index', ['id_spk' => $request->spk_id]);
    }

    public function edit(Alternatif $alternatif)
    {
        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Alternatif $alternatif, AlternatifRequest $request)
    {
        $alternatif->update($request->all());
        Session::flash('flash_message', 'Berhasil Update Data');

        return redirect()->route('alternatif.index', ['id_spk' => $request->spk_id]);
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        Session::flash('flash_message', 'Berhasil Hapus Data');
        return redirect()->route('alternatif.index', ['id_spk' => $alternatif->spk_id]);
    }

    // public function show($id_spk)
    // {
    //  $list_alternatif = Alternatif::where('spk_id', $id_spk)->get();
    //  return view('alternatif.index', compact('list_alternatif'));
    // }
}
