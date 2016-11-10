<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'parent_id',
        'permission_id',
        'title',
        'url',
        'enable',
        'order',
    ];
}
