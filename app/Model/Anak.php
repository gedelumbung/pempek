<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'nama',
    	'tempat_lahir',
    	'tanggal_lahir',
    	'jenis_kelamin',
    	'pendidikan',
    	'pekerjaan',
    	'agama',
    	'status_perkawinan',
    	'status_hidup',
    	'status_anak',
    	'alamat',
    	'telepon',
    ];
}
