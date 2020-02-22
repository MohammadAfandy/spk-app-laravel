<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
	protected $table = 'alternatif';

	protected $fillable = [
		'id',
		'nama',
		'spk_id',
		'ket',
	];
	
	public $timestamps = true;

	public function spk()
	{
		return $this->hasOne('SpkApp\Spk', 'id', 'spk_id');
	}
}
