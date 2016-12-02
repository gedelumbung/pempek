<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatJabatan;
use Simpeg\Model\JabatanStruktural;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;

/**
* Riwayat Jabatan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class RiwayatJabatanController extends Controller
{
	
	public function index($id, RiwayatJabatan $riwayat, JabatanStruktural $jabatan, UnitKerja $unit_kerja)
	{
		$riwayat = $riwayat->where('pegawai_id', $id)->paginate(15);
		$jabatan = $jabatan->get();
		$unit_kerja = $unit_kerja->get();
		return view('backend.riwayat_jabatan.index', compact('riwayat', 'id', 'jabatan', 'unit_kerja'));
	}
	
	public function create($id, JabatanStruktural $jabatan, UnitKerja $unit_kerja)
	{
		$jabatan = $jabatan->get();
		$unit_kerja = $unit_kerja->get();
		return view('backend.riwayat_jabatan.add', compact('id', 'jabatan', 'unit_kerja'));
	}

	public function store($pegawai, Request $request, RiwayatJabatan $riwayat)
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
		return redirect(route('dashboard.pegawai.riwayat_jabatan', ['pegawai' => $pegawai_id]));
	}

	public function delete($pegawai, $id, RiwayatJabatan $riwayat)
	{
		$riwayat->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.pegawai.riwayat_jabatan', ['pegawai' => $pegawai]));
	}
}