<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatKursusLog extends Model
{
    protected $table = 'riwayat_kursus_log';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'nama_kursus',
    	'jumlah_jam',
    	'nomor_sertifikat',
    	'tanggal',
    	'penyelenggara'
    ];
}
