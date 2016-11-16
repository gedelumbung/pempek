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
}
