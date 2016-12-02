<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\JabatanStruktural;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;

/**
* Jabatan Struktural Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class JabatanStrukturalController extends Controller
{
	
	public function index(JabatanStruktural $jabatan)
	{
		$jabatan = $jabatan->paginate(15);
		return view('backend.jabatan.index', compact('jabatan'));
	}

	public function status($id, $status, JabatanStruktural $jabatan)
	{
    	$jabatan = $jabatan->findOrFail($id);
    	$jabatan->status = $status;
    	$jabatan->save();
        flashy()->success('Berhasil mengganti status.');
		return redirect(route('dashboard.jabatan_struktural'));
	}

	public function create(UnitKerja $unitKerja)
	{
		$action = 'add';
		$unit_kerja = $unitKerja->where('parent_id', 0)->get();
		return view('backend.jabatan.form', compact('action','unit_kerja'));
	}

	public function edit($id, JabatanStruktural $jabatan, UnitKerja $unitKerja)
	{
		$action = 'edit';
		$jabatan = $jabatan->findOrFail($id);
		$unit_kerja = $unitKerja->where('parent_id', 0)->get();
		return view('backend.jabatan.form', compact('action', 'jabatan', 'unit_kerja'));
	}

	public function store(Request $request, JabatanStruktural $jabatan)
	{
        $this->validate($request, [
            'title' => 'required',
            'unit_kerja_id' => 'required',
            'eselon' => 'required',
        ]);
        extract($request->only('title', 'eselon', 'unit_kerja_id', 'action', 'id'));

        if ($action === 'add') {
        	$jabatan->create([
        		'title' => $title,
        		'eselon' => $eselon,
        		'unit_kerja_id' => $unit_kerja_id,
        		'status' => 1,
        		'level' => 0,
        	]);
        } elseif ($action === 'edit') {
        	$jabatan = $jabatan->findOrFail($id);
        	$jabatan->title = $title;
        	$jabatan->unit_kerja_id = $unit_kerja_id;
        	$jabatan->eselon = $eselon;
        	$jabatan->save();
        }

        flashy()->success('Berhasil menyimpan data.');

		return redirect(route('dashboard.jabatan_struktural'));
	}

	public function delete($id, JabatanStruktural $jabatan)
	{
		$jabatan->findOrFail($id)->delete();
        flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.jabatan_struktural'));
	}
}