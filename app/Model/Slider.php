<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'title',
    	'image',
    ];
}
