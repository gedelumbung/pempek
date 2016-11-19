<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    protected $table = 'pasangan';

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
    	'jenis_kelamin',
    	'email',
    	'telepon',
    	'status_hidup',
    	'alamat',
    	'status_perkawinan',
    	'akte_perceraian',
    	'tanggal_akte_perceraian',
    	'akte_kelahiran',
    	'tanggal_akte_kelahiran',
    	'akte_meninggal',
    	'tanggal_akte_meninggal',
    	'npwp',
    	'tanggal_npwp',
    	'nama_pasangan',
    	'nip_pasangan',
    ];
}
