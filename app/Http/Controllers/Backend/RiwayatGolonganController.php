<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatGolongan;
use Simpeg\Model\Golongan;
use Illuminate\Http\Request;

/**
* Riwayat Golongan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RiwayatGolonganController extends Controller
{
	
	public function index($id, RiwayatGolongan $riwayat, Golongan $golongan)
	{
		$riwayat = $riwayat->where('pegawai_id', $id)->paginate(15);
		$golongan = $golongan->get();
		return view('backend.riwayat_golongan.index', compact('riwayat', 'id', 'golongan'));
	}
	
	public function create($id, Golongan $golongan)
	{
		$golongan = $golongan->get();
		return view('backend.riwayat_golongan.add', compact('id', 'golongan'));
	}

	public function store($pegawai, Request $request, RiwayatGolongan $riwayat)
	{
		$arr = $request->except('_token', 'status', 'id');
		extract($request->only('status', 'id', 'pegawai_id'));

		if($status === 'add'){
			$riwayat->insert($arr);
		}
		elseif($status === 'edit'){
			$riwayat->findOrFail($id)->update($arr);
		}

		return redirect(route('dashboard.pegawai.riwayat_golongan', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, RiwayatGolongan $riwayat)
	{
		$riwayat->findOrFail($id)->delete();
		return redirect(route('dashboard.pegawai.riwayat_golongan', ['pegawai' => $pegawai]));
	}
}