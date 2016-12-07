<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public function sub($parent_id)
    {
    	return self::where('parent_id', $parent_id)->get();
    }
}
