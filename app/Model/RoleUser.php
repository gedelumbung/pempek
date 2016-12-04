<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'role_id'
    ];
}
