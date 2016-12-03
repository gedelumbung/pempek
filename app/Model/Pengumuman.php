<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'title',
    	'description',
    ];
}
