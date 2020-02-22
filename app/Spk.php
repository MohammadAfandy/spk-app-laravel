<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
	protected $table = 'spk';

	protected $fillable = [
		'id',
		'nama',
		'jenis_bobot_id',
		'ket',
	];

	public $timestamps = true;

	public function jenisBobot()
	{
		return $this->hasOne('SpkApp\JenisBobot', 'id', 'jenis_bobot_id');
	}

	public function alternatif()
	{
		return $this->hasMany('SpkApp\Alternatif', 'spk_id', 'id');
	}
}
