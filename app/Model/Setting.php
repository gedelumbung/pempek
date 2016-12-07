<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
    	'title',
    	'content',
    ];
}
