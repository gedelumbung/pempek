<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    protected $table = 'jabatan_struktural';

    protected $fillable = [
        'unit_kerja_id',
        'title',
        'eselon',
        'status',
        'level',
    ];

    public function unit_kerja()
    {
        return $this->belongsTo('Simpeg\Model\UnitKerja', 'unit_kerja_id');
    }
}
