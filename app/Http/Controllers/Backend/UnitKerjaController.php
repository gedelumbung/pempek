<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;

/**
* Unit Kerja Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class UnitKerjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:unitkerja-master');
    }
	
	public function index(UnitKerja $unit_kerja)
	{
		$unit_kerja = $unit_kerja->where('parent_id', 0)->paginate(15);
		return view('backend.unit_kerja.index', compact('unit_kerja'));
	}

	public function create()
	{
		$action = 'add';
		return view('backend.unit_kerja.form', compact('action'));
	}

	public function edit($id, UnitKerja $unit_kerja)
	{
		$action = 'edit';
		$unit_kerja = $unit_kerja->findOrFail($id);
		return view('backend.unit_kerja.form', compact('action', 'unit_kerja'));
	}

	public function store(Request $request, UnitKerja $unit_kerja)
	{
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        extract($request->only('title', 'description', 'id', 'action'));

        if ($action === 'add') {
        	$unit_kerja->create([
        		'title' => $title,
        		'description' => $description,
        	]);
        } elseif ($action === 'edit') {
        	$unit_kerja = $unit_kerja->findOrFail($id);
        	$unit_kerja->title = $title;
        	$unit_kerja->description = $description;
        	$unit_kerja->save();
        }
        flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.unit_kerja'));
	}

	public function delete($id, UnitKerja $unit_kerja)
	{
		$unit_kerja->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.unit_kerja'));
	}
}