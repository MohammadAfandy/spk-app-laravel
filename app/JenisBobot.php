<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class JenisBobot extends Model
{
    //
    protected $table = 'm_jenis_bobot';

	protected $fillable = [
		'id',
		'nama',
	];

	public $timestamps = true;
}
