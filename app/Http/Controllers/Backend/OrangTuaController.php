<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Ibu;
use Simpeg\Model\Ayah;
use Illuminate\Http\Request;

/**
* Orang Tua Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class OrangTuaController extends Controller
{
	
	public function index($id, Ibu $ibu, Ayah $ayah)
	{
		$ayah = $ayah->where('pegawai_id', $id)->first();
		$ibu = $ibu->where('pegawai_id', $id)->first();
		return view('backend.orang_tua.index', compact('ayah', 'ibu', 'id'));
	}

	public function store($pegawai, Request $request, Ibu $ibu, Ayah $ayah)
	{
		$arr = $request->except('_token', 'status', 'id', 'gender');
		extract($request->only('status', 'id', 'pegawai_id', 'gender'));

		if($status === 'add'){
			if ($gender == 'female') {
				$ibu->insert($arr);
			} elseif ($gender == 'male') {
				$ayah->insert($arr);
			}
		}
		elseif($status === 'edit'){
			if ($gender == 'female') {
				$ibu->findOrFail($id)->update($arr);
			} elseif ($gender == 'male') {
				$ayah->findOrFail($id)->update($arr);
			}
		}
		flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.pegawai.orang_tua', ['pegawai' => $pegawai_id]));
	}
}