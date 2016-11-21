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
    	'unit_kerja_id',
    	'jabatan_struktural_id',
    	'instansi',
    	'nomor_sk',
    	'tanggal',
    	'tmt',
    	'eselon',
    ];

    public function unit_kerja()
    {
        return $this->belongsTo('Simpeg\Model\UnitKerja', 'unit_kerja_id');
    }

    public function jabatan()
    {
        return $this->belongsTo('Simpeg\Model\JabatanStruktural', 'jabatan_struktural_id');
    }
}
