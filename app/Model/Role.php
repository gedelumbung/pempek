<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;
use Simpeg\Model\PermissionRole;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public function findPermissionRole($permission_id, $role_id)
    {
    	return PermissionRole::where('permission_id', $permission_id)->where('role_id', $role_id)->first();
    }
}
