<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatPendidikan;
use Illuminate\Http\Request;

/**
* Riwayat Pendidikan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RiwayatPendidikanController extends Controller
{
	
	public function index($id, RiwayatPendidikan $riwayat)
	{
		$riwayat = $riwayat->where('pegawai_id', $id)->paginate(15);
		return view('backend.riwayat_pendidikan.index', compact('riwayat', 'id'));
	}
	
	public function create($id)
	{
		return view('backend.riwayat_pendidikan.add', compact('id'));
	}

	public function store($pegawai, Request $request, RiwayatPendidikan $riwayat)
	{
		$arr = $request->except('_token', 'status', 'id');
		extract($request->only('status', 'id', 'pegawai_id'));

		if($status === 'add'){
			$riwayat->insert($arr);
		}
		elseif($status === 'edit'){
			$riwayat->findOrFail($id)->update($arr);
		}

		return redirect(route('dashboard.pegawai.riwayat_pendidikan', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, RiwayatPendidikan $riwayat)
	{
		$riwayat->findOrFail($id)->delete();
		return redirect(route('dashboard.pegawai.riwayat_pendidikan', ['pegawai' => $pegawai]));
	}
}