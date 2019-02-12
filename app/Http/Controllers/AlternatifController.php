<?php

namespace SpkApp\Http\Controllers;

use Illuminate\Http\Request;
use SpkApp\Alternatif;
use SpkApp\Http\Requests\AlternatifRequest;
use Session;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
	public function show($id_spk)
	{
		$list_alternatif = Alternatif::where('id_spk', $id_spk)->get();
		return view('alternatif.index', compact('list_alternatif'));
	}
}
