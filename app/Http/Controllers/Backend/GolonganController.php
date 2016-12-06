<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Golongan;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;

/**
* Golongan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class GolonganController extends Controller
{
	public function __construct()
	{
		var_dump(\Auth::user()->roles->toArray());die;
		$role = Role::find(1);
		if (!$role->can('golongan')) {
			return \Redirect::route('home')->send();
		}
	}

	public function index(Golongan $golongan)
	{
		$golongan = $golongan->paginate(15);
		return view('backend.golongan.index', compact('golongan'));
	}

	public function create()
	{
		$action = 'add';
		return view('backend.golongan.form', compact('action'));
	}

	public function edit($id, Golongan $golongan)
	{
		$action = 'edit';
		$golongan = $golongan->findOrFail($id);
		return view('backend.golongan.form', compact('action', 'golongan'));
	}

	public function store(Request $request, Golongan $golongan)
	{
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        extract($request->only('title', 'description', 'action', 'id'));

        if ($action === 'add') {
        	$golongan->create([
        		'title' => $title,
        		'description' => $description,
        	]);
        } elseif ($action === 'edit') {
        	$golongan = $golongan->findOrFail($id);
        	$golongan->title = $title;
        	$golongan->description = $description;
        	$golongan->save();
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.golongan'));
	}

	public function delete($id, Golongan $golongan)
	{
		$golongan->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.golongan'));
	}
}