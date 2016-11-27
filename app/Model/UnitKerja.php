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

    public function duk()
    {
        return $this->hasMany('Simpeg\Model\DukView')->orderBy('golongan', 'desc')
					->orderBy('tmt_golongan', 'desc')
					->orderBy('level', 'desc')
					->orderBy('masa_kerja', 'desc')
					->orderBy('jumlah_diklat', 'desc')
					->orderBy('pendidikan', 'desc')
					->orderBy('usia', 'desc');
    }
}
