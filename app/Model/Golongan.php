<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';

    protected $fillable = [
        'title',
        'description'
    ];
}
