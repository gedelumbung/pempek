<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    protected $table = 'jabatan_struktural';

    protected $fillable = [
        'satuan_kerja_id',
        'title',
        'eselon',
        'status',
    ];
}
