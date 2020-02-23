<?php

namespace SpkApp;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    protected $fillable = [
        'id',
        'altenatif_id',
        'sub_kriteria_id',
        'nilai',
        'ket',
    ];
    
    public $timestamps = true;

    public function alternatif()
    {
        return $this->hasMany('SpkApp\Alternatif', 'id', 'altenatif_id');
    }

    public function subKriteria()
    {
        return $this->hasMany('SpkApp\subKriteria', 'id', 'sub_kriteria_id');
    }
}
