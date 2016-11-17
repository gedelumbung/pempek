<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = 'riwayat_pendidikan';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'nama_sekolah',
    	'tingkat_pendidikan',
    	'fakultas',
    	'ijazah_pendidikan',
    	'tanggal_lulus',
    	'nama_pimpinan',
    ];
}
