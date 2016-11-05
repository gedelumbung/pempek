<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class SatuanKerja extends Model
{
    protected $table = 'satuan_kerja';

    protected $fillable = [
        'unit_kerja_id',
        'title',
        'description'
    ];
}
