<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

	protected $fillable = [
		'id',
		'nama',
		'tipe',
        'bobot',
		'spk_id',
		'ket',
	];
	
	public $timestamps = true;

	public function spk()
	{
		return $this->hasOne('SpkApp\Spk', 'id', 'spk_id');
	}

	public function subKriteria()
	{
		return $this->hasMany('SpkApp\SubKriteria', 'kriteria_id', 'id');
	}
}
