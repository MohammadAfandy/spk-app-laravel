<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $table = 'sub_kriteria';

    protected $fillable = [
		'id',
		'nama',
		'nilai',
        'kriteria_id',
        'ket',
	];
	
	public $timestamps = true;

	public function kriteria()
	{
		return $this->belongsTo('SpkApp\Kriteria', 'id', 'kriteria_id');
	}
}
