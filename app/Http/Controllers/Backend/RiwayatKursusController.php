<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatKursus;
use Illuminate\Http\Request;

/**
* Riwayat Kursus Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RiwayatKursusController extends Controller
{
	
	public function index($id, RiwayatKursus $riwayat)
	{
		$riwayat = $riwayat->where('pegawai_id', $id)->paginate(15);
		return view('backend.riwayat_kursus.index', compact('riwayat', 'id'));
	}
	
	public function create($id)
	{
		return view('backend.riwayat_kursus.add', compact('id'));
	}

	public function store($pegawai, Request $request, RiwayatKursus $riwayat)
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
		return redirect(route('dashboard.pegawai.riwayat_kursus', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, RiwayatKursus $riwayat)
	{
		$riwayat->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.pegawai.riwayat_kursus', ['pegawai' => $pegawai]));
	}
}