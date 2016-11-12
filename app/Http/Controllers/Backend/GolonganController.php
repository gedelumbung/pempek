<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Golongan;
use Illuminate\Http\Request;

/**
* Golongan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class GolonganController extends Controller
{
	
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

		return redirect(route('dashboard.golongan'));
	}

	public function delete($id, Golongan $golongan)
	{
		$golongan->findOrFail($id)->delete();
		return redirect(route('dashboard.golongan'));
	}
}