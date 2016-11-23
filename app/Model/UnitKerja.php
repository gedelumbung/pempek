<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';

    protected $fillable = [
        'title',
        'description'
    ];

    public function jabatan()
    {
        return $this->hasMany('Simpeg\Model\JabatanStruktural', 'unit_kerja_id', 'id');
    }
}
