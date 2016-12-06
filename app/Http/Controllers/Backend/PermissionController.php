<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Role;
use Simpeg\Model\Permission;
use Illuminate\Http\Request;
use Simpeg\Model\PermissionRole;
use Caffeinated\Shinobi\Models\Role as Roles;
use DB;

/**
* Permission Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:permission');
    }
	
	public function index(Role $roles, Permission $permissions)
	{
		$roles = $roles->get();
		$permissions = $permissions->get();

		return view('backend.permission.index', compact('roles', 'permissions'));
	}

	public function store(Request $request, PermissionRole $permissionRole)
	{
		extract($request->only('permission_role'));
		$permissionRole->truncate();

		if (!empty($permission_role)) {
			$permissionRole->truncate();
			foreach ($permission_role as $value) {
				$data = explode(",", $value);
				$permissionRole->create([
					'permission_id' => $data[0],
					'role_id' => $data[1]
				]);

	            $role = Roles::find($data[1]);
	            $permission_id_list = PermissionRole::where('role_id',$data[1])->pluck('permission_id')->toArray();
	            $role->syncPermissions($permission_id_list);
	            $role->save();
			}
		}

        flashy()->success('Berhasil menyimpan data.');
		return back();
	}
}