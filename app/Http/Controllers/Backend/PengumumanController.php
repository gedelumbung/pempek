<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pengumuman;
use Illuminate\Http\Request;

/**
* Pengumuman Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PengumumanController extends Controller
{
	
	public function index(Pengumuman $pengumuman)
	{
		$pengumuman = $pengumuman->paginate(15);
		return view('backend.pengumuman.index', compact('pengumuman'));
	}

	public function create()
	{
		$action = 'add';
		return view('backend.pengumuman.form', compact('action'));
	}

	public function edit($id, Pengumuman $pengumuman)
	{
		$action = 'edit';
		$pengumuman = $pengumuman->findOrFail($id);
		return view('backend.pengumuman.form', compact('action', 'pengumuman'));
	}

	public function store(Request $request, Pengumuman $pengumuman)
	{
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        extract($request->only('title', 'description', 'action', 'id'));

        if ($action === 'add') {
        	$pengumuman->create([
        		'title' => $title,
        		'description' => $description,
        	]);
        } elseif ($action === 'edit') {
        	$pengumuman = $pengumuman->findOrFail($id);
        	$pengumuman->title = $title;
        	$pengumuman->description = $description;
        	$pengumuman->save();
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.pengumuman'));
	}

	public function delete($id, Pengumuman $pengumuman)
	{
		$pengumuman->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.pengumuman'));
	}
}