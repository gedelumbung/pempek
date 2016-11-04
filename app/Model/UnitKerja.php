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
}
