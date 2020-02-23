<?php

namespace SpkApp\Http\Controllers;

use SpkApp\Penilaian;
use SpkApp\Spk;
use SpkApp\Kriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_spk = Spk::pluck('nama', 'id');
        $spk_id = $request->input('id_spk');
        $count_penilaian = 0;
        $kriterias = [];

        if ($spk_id) {
            $count_penilaian = Penilaian::distinct('alternatif_id')->where('spk.id', $spk_id)
                            ->leftJoin('alternatif', 'penilaian.alternatif_id', 'alternatif.id')
                            ->leftJoin('spk', 'alternatif.spk_id', 'spk.id')
                            ->count('alternatif_id');

            $kriterias = Kriteria::where('spk_id', $spk_id)->get();

        }
        return view('penilaian.index', compact('count_penilaian', 'kriterias', 'list_spk', 'spk_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \SpkApp\penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SpkApp\penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SpkApp\penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SpkApp\penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(penilaian $penilaian)
    {
        //
    }
}
