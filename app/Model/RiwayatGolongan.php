<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatGolongan extends Model
{
    protected $table = 'riwayat_golongan';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'golongan_id',
    	'tmt',
    	'masa_kerja_tahun',
    	'masa_kerja_bulan',
    	'nomor_sk',
    	'tanggal_sk',
    	'nomor_persetujuan_bkn',
    	'tahun_persetujuan_bkn'
    ];
}
