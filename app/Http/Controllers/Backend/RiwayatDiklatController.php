<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatDiklat;
use Illuminate\Http\Request;

/**
* Riwayat Diklat Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RiwayatDiklatController extends Controller
{
	
	public function index($id, RiwayatDiklat $riwayat)
	{
		$riwayat = $riwayat->where('pegawai_id', $id)->paginate(15);
		return view('backend.riwayat_diklat.index', compact('riwayat', 'id'));
	}
	
	public function create($id)
	{
		return view('backend.riwayat_diklat.add', compact('id'));
	}

	public function store($pegawai, Request $request, RiwayatDiklat $riwayat)
	{
		$arr = $request->except('_token', 'status', 'id');
		extract($request->only('status', 'id', 'pegawai_id'));

		if($status === 'add'){
			$riwayat->insert($arr);
		}
		elseif($status === 'edit'){
			$riwayat->findOrFail($id)->update($arr);
		}
		flashy()->success('Berhasil menyimpan data.');
		return redirect(route('dashboard.pegawai.riwayat_diklat', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, RiwayatDiklat $riwayat)
	{
		$riwayat->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.pegawai.riwayat_diklat', ['pegawai' => $pegawai]));
	}
}