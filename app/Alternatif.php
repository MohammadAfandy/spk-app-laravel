<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
	const CREATED_AT = 'created_date';
	const UPDATED_AT = 'updated_date'; 

	protected $table = 'alternatif';

	protected $fillable = [
		'id',
		'nama_alternatif',
		'keterangan',
		'id_spk',
	];

	public $timestamps = true;
}
