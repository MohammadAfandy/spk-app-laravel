<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
	const CREATED_AT = 'created_date';
	const UPDATED_AT = 'updated_date'; 

    protected $table = 'spk';

    protected $fillable = [
    	'id',
    	'nama_spk',
    	'keterangan',
    ];

    public $timestamps = true;
}
