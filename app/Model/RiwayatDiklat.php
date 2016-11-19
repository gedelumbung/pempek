<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiklat extends Model
{
    protected $table = 'riwayat_diklat';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'nama_diklat',
    	'nomor_sertifikat',
    	'tahun',
    	'jumlah_jam',
    ];
}
