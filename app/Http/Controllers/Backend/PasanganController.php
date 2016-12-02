<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pasangan;
use Illuminate\Http\Request;

/**
* Pasangan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PasanganController extends Controller
{
	
	public function index($id, Pasangan $pasangan)
	{
		$pasangan = $pasangan->where('pegawai_id', $id)->first();
		return view('backend.pasangan.index', compact('pasangan', 'ibu', 'id'));
	}

	public function store($pegawai, Request $request, Pasangan $pasangan)
	{
		$arr = $request->except('_token', 'status', 'id');
		extract($request->only('status', 'id', 'pegawai_id'));

		if($status === 'add'){
			$pasangan->insert($arr);
		}
		elseif($status === 'edit'){
			$pasangan->findOrFail($id)->update($arr);
		}
		flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.pegawai.pasangan', ['pegawai' => $pegawai_id]));
	}
}