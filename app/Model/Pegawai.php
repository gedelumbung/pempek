<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $casts = [
        'features' => 'json'
    ];

    public function unit_kerja()
    {
        return $this->belongsTo('Simpeg\Model\UnitKerja');
    }

    public function jabatan_struktural()
    {
        return $this->belongsTo('Simpeg\Model\JabatanStruktural');
    }

    public function golongan_awal()
    {
        return $this->belongsTo('Simpeg\Model\Golongan', 'golongan_id_awal');
    }

    public function golongan_akhir()
    {
        return $this->belongsTo('Simpeg\Model\Golongan', 'golongan_id_awal');
    }
}
