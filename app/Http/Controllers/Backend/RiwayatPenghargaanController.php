<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatPenghargaan;
use Illuminate\Http\Request;

/**
* Riwayat Penghargaan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RiwayatPenghargaanController extends Controller
{
	
	public function index($id, RiwayatPenghargaan $riwayat)
	{
		$riwayat = $riwayat->where('pegawai_id', $id)->paginate(15);
		return view('backend.riwayat_penghargaan.index', compact('riwayat', 'id'));
	}
	
	public function create($id)
	{
		return view('backend.riwayat_penghargaan.add', compact('id'));
	}

	public function store($pegawai, Request $request, RiwayatPenghargaan $riwayat)
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
		return redirect(route('dashboard.pegawai.riwayat_penghargaan', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, RiwayatPenghargaan $riwayat)
	{
		$riwayat->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.pegawai.riwayat_penghargaan', ['pegawai' => $pegawai]));
	}
}