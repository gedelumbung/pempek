<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Role;
use Illuminate\Http\Request;

/**
* Role Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RoleController extends Controller
{
	
	public function index(Role $role)
	{
		$roles = $role->paginate(15);
		return view('backend.roles.index', compact('roles'));
	}

	public function create()
	{
		$action = 'add';
		return view('backend.roles.form', compact('action'));
	}

	public function edit($id, Role $role)
	{
		$action = 'edit';
		$role = $role->findOrFail($id);
		return view('backend.roles.form', compact('action', 'role'));
	}

	public function store(Request $request, Role $role)
	{
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        extract($request->only('name', 'display_name', 'description', 'action', 'id'));

        if ($action === 'add') {
        	$role->create([
        		'name' => $name,
        		'display_name' => $display_name,
        		'description' => $description,
        	]);
        } elseif ($action === 'edit') {
        	$role = $role->findOrFail($id);
        	$role->name = $name;
        	$role->display_name = $display_name;
        	$role->description = $description;
        	$role->save();
        }

		return redirect(route('dashboard.roles'));
	}

	public function delete($id, Role $role)
	{
		$role->findOrFail($id)->delete();
		return redirect(route('dashboard.roles'));
	}
}