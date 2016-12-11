<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\RiwayatDiklat;
use Simpeg\Model\RiwayatDiklatLog;
use Simpeg\Model\Pegawai;
use Simpeg\Model\PegawaiLog;
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

	public function store($pegawai, Request $request, RiwayatDiklat $riwayat, RiwayatDiklatLog $riwayatLog, PegawaiLog $pegawaiLog)
	{
		$arr = $request->except('_token', 'status', 'id');
		extract($request->only('status', 'id', 'pegawai_id'));

		if($status === 'add'){
			$pegawai_log = $pegawaiLog->where('pegawai_id', $pegawai_id)->first();
			if (empty($pegawai_log)) {
				$pegawai = Pegawai::findOrFail($pegawai_id);

				$arrPegawai = $pegawai->toArray();
				$arrPegawai['pegawai_id'] = $pegawai_id;
				$arrPegawai['status'] = 1;
				$pegawaiLog->insert($arrPegawai);
			}
			else {
				$log = $pegawaiLog->where('pegawai_id', $pegawai_id)->first();
				$arrPegawai['pegawai_id'] = $pegawai_id;
				if ($log->status == 2) {
					$arrPegawai['status'] = 1;
				}
				$log->update($arrPegawai);
			}

			$arr['pegawai_id'] = $pegawai_id;
			$riwayatLog->insert($arr);

			flashy()->success('Berhasil menyimpan data. Data akan divalidasi terlebih dahulu.');
			return redirect(route('dashboard.pegawai.riwayat_diklat', ['pegawai' => $pegawai_id]));
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