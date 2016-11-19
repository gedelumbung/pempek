<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Anak;
use Illuminate\Http\Request;

/**
* Anak Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class AnakController extends Controller
{
	
	public function index($id, Anak $anak)
	{
		$anak = $anak->where('pegawai_id', $id)->paginate(15);
		return view('backend.anak.index', compact('anak', 'id'));
	}
	
	public function create($id, Anak $anak)
	{
		return view('backend.anak.add', compact('id'));
	}

	public function store($pegawai, Request $request, Anak $anak)
	{
		$arr = $request->except('_token', 'status', 'id');
		extract($request->only('status', 'id', 'pegawai_id'));

		if($status === 'add'){
			$anak->insert($arr);
		}
		elseif($status === 'edit'){
			$anak->findOrFail($id)->update($arr);
		}

		return redirect(route('dashboard.pegawai.anak', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, Anak $anak)
	{
		$anak->findOrFail($id)->delete();
		return redirect(route('dashboard.pegawai.anak', ['pegawai' => $pegawai]));
	}
}