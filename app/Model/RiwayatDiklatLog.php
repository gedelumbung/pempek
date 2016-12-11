<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiklatLog extends Model
{
    protected $table = 'riwayat_diklat_log';

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
