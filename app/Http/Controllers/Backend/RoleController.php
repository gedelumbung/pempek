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
	public function __construct()
	{
        $this->middleware('role:permission');
	}
	
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
            'slug' => 'required',
            'description' => 'required',
        ]);
        extract($request->only('name', 'slug', 'description', 'action', 'id'));

        if ($action === 'add') {
        	$role->create([
        		'name' => $name,
        		'slug' => $slug,
        		'description' => $description,
        	]);
        } elseif ($action === 'edit') {
        	$role = $role->findOrFail($id);
        	$role->name = $name;
        	$role->slug = $slug;
        	$role->description = $description;
        	$role->save();
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.roles'));
	}

	public function delete($id, Role $role)
	{
		$role->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.roles'));
	}
}