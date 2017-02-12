<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    protected $table = 'riwayat_jabatan';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'unit_kerja',
    	'jabatan_struktural',
    	'instansi',
    	'nomor_sk',
    	'tanggal',
    	'tmt',
    	'eselon',
    ];
}
