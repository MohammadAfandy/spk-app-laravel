<?php

namespace SpkApp\Http\Controllers;

use Illuminate\Http\Request;
use SpkApp\Kriteria;
use SpkApp\Spk;
use SpkApp\Http\Requests\KriteriaRequest;
use SpkApp\Http\Requests\BobotRequest;
use Session;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $list_spk = Spk::pluck('nama', 'id');
        $spk_id = $request->input('id_spk');
        $kriterias = [];

        if ($spk_id) {
            $kriterias = Kriteria::where('spk_id', $spk_id)->get();
        }
        return view('kriteria.index', compact('kriterias', 'list_spk', 'spk_id'));
    }

    public function create(Request $request)
    {
        $spk_id = $request->input('id_spk');
        if (!$spk_id) {
            return redirect()->route('kriteria.index');
        }

        $spk = Spk::find($spk_id);
        $tipe = app('spk.helper')->getKriteriaTipe();
        return view('kriteria.create', compact('spk', 'tipe'));
    }

    public function store(KriteriaRequest $request)
    {
        DB::transaction(function() use($request) {
            $reset_bobot = Kriteria::where('spk_id', $request->spk_id)->update(['bobot' => 0]);
            $kriteria = Kriteria::create($request->all());
        });
        Session::flash('flash_message', 'Berhasil Tambah Data');

        return redirect()->route('kriteria.index', ['id_spk' => $request->spk_id]);
    }

    public function edit(Kriteria $kriteria)
    {
        $tipe = app('spk.helper')->getKriteriaTipe();
        return view('kriteria.edit', compact('kriteria', 'tipe'));
    }

    public function update(Kriteria $kriteria, KriteriaRequest $request)
    {
        $kriteria->update($request->all());
        Session::flash('flash_message', 'Berhasil Update Data');

        return redirect()->route('kriteria.index', ['id_spk' => $request->spk_id]);
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        Session::flash('flash_message', 'Berhasil Hapus Data');
        return redirect()->route('kriteria.index', ['id_spk' => $kriteria->spk_id]);
    }

    // public function show($id_spk)
    // {
    //  $list_kriteria = Kriteria::where('spk_id', $id_spk)->get();
    //  return view('kriteria.index', compact('list_kriteria'));
    // }

    public function setBobot(BobotRequest $request)
    {
        $input = $request->all();
        
        DB::transaction(function() use($input) {
            foreach ($input['bobot'] as $id => $bobot) {
                Kriteria::where('id', $id)->update(['bobot' => $bobot]);
            }
        });

        return response('Success');
    }
}