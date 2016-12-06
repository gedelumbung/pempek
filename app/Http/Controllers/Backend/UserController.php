<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\User;
use Simpeg\Model\Pegawai;
use Simpeg\Model\RoleUser;
use Simpeg\Model\Role;
use Illuminate\Http\Request;

/**
* User Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:permission');
    }
	
	public function index(User $users)
	{
		$users = $users->paginate(15);
		return view('backend.users.index', compact('users'));
	}

	public function create(Pegawai $pegawai, Role $roles)
	{
		$action = 'add';
		$pegawai = $pegawai->get();
		$roles = $roles->get();
		return view('backend.users.create', compact('action','pegawai','roles'));
	}

	public function edit($id, User $users, Pegawai $pegawai, Role $roles)
	{
		$action = 'edit';
		$users = $users->findOrFail($id);
		$pegawai = $pegawai->get();
		$roles = $roles->get();
		return view('backend.users.edit', compact('action', 'users', 'pegawai', 'roles'));
	}

	public function store(Request $request, User $users, RoleUser $roleUser)
	{
        $this->validate($request, [
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);
        extract($request->only('nip', 'name', 'email', 'password', 'pegawai_id', 'status', 'role_id', 'action', 'id'));

        if ($action === 'add') {
        	$param = [];
        	$param['nip'] = $nip;
        	$param['name'] = $name;
        	$param['email'] = $email;
        	$param['password'] = bcrypt($password);
        	if ($status == 'pegawai') {
        		$param['pegawai_id'] = $pegawai_id;
        	}
        	$user = $users->create($param);
        	$roleUser->create([
        		'user_id' => $user->id,
        		'role_id' => $role_id,
        	]);
        } elseif ($action === 'edit') {
        	$users = $users->findOrFail($id);
        	$users->name = $name;
        	$users->nip = $nip;
        	$users->name = $name;
        	$users->email = $email;
        	if (!empty($password)) {
        		$users->password = bcrypt($password);
        	}
        	$user = $users->save();

        	$roleUser->where('user_id', $users->id)->delete();
        	$roleUser->create([
        		'user_id' => $users->id,
        		'role_id' => $role_id,
        	]);
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.users'));
	}

	public function delete($id, User $users)
	{
		$users->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.users'));
	}
}