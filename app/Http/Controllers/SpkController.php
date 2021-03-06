<?php

namespace SpkApp\Http\Controllers;

use Illuminate\Http\Request;
use SpkApp\Spk;
use SpkApp\Http\Requests\SpkRequest;
use SpkApp\JenisBobot;
use Session;

class SpkController extends Controller
{
    public function index()
    {
        $list_spk = Spk::all();
        return view('spk.index', compact('list_spk'));
    }

    public function create()
    {
        $list_bobot = JenisBobot::pluck('nama', 'id');
        return view('spk.create', compact('list_bobot'));
    }

    public function store(SpkRequest $request)
    {
        $input = $request->all();
        $spk = Spk::create($input);
        Session::flash('flash_message', 'Berhasil Tambah Data');

        return redirect('spk');
    }

    public function edit(Spk $spk)
    {
        $list_bobot = JenisBobot::pluck('nama', 'id');
        return view('spk.edit', compact('spk', 'list_bobot'));
    }

    public function update(Spk $spk, SpkRequest $request)
    {
        $input = $request->all();

        $spk->update($input);

        Session::flash('flash_message', 'Berhasil Update Data');

        return redirect('spk');
    }

    public function destroy(Spk $spk)
    {
        $spk->delete();
        Session::flash('flash_message', 'Berhasil Hapus Data');
        return redirect('spk');
    }
}
