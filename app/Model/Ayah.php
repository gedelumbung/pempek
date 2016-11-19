<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    protected $table = 'ayah';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'nama',
    	'gelar_depan',
    	'gelar_belakang',
    	'tempat_lahir',
    	'tanggal_lahir',
    	'agama',
    	'email',
    	'telepon',
    	'status_perkawinan',
    	'status_hidup',
    	'alamat',
    ];
}
