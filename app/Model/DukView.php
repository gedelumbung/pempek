<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class DukView extends Model
{
    protected $table = 'duk_view';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'pegawai_id',
    	'golongan',
    	'usia',
    	'satuan_kerja_id',
    	'level',
    	'masa_kerja',
    	'jumlah_diklat',
    	'pendidikan'
    ];

    public function pegawai()
    {
        return $this->belongsTo('Simpeg\Model\Pegawai');
    }
}
