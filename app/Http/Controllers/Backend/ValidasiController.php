<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\PegawaiLog;
use Simpeg\Model\RiwayatPendidikan;
use Simpeg\Model\RiwayatPendidikanLog;
use Simpeg\Model\RiwayatDiklat;
use Simpeg\Model\RiwayatDiklatLog;
use Simpeg\Model\RiwayatKursus;
use Simpeg\Model\RiwayatKursusLog;
use Simpeg\Model\RiwayatPenghargaan;
use Simpeg\Model\RiwayatPenghargaanLog;
use Illuminate\Http\Request;
use Simpeg\Model\RoleUser;

/**
* Validasi Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class ValidasiController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:validasi');
	}
	
	public function index(PegawaiLog $pegawaiLog)
	{
		$pegawai = $pegawaiLog->whereIn('status',[0,1])->get();
		return view('backend.validasi.index', compact('pegawai'));
	}

	public function show($id,PegawaiLog $pegawaiLog, RiwayatPendidikanLog $riwayatPendidikanLog, RiwayatDiklatLog $riwayatDiklatLog, RiwayatKursusLog $riwayatKursusLog, RiwayatPenghargaanLog $riwayatPenghargaanLog)
	{
		$pegawai_log = $pegawaiLog->where('pegawai_id',$id)->whereIn('status',[0,1])->first();
		$riwayat_pendidikan = $riwayatPendidikanLog->where('pegawai_id', $id)->get();
		$riwayat_diklat = $riwayatDiklatLog->where('pegawai_id', $id)->get();
		$riwayat_kursus = $riwayatKursusLog->where('pegawai_id', $id)->get();
		$riwayat_penghargaan = $riwayatPenghargaanLog->where('pegawai_id', $id)->get();
		
		return view('backend.validasi.show', compact('pegawai_log','riwayat_pendidikan','riwayat_diklat','riwayat_kursus','riwayat_penghargaan'));
	}

	public function approvePegawai($id, $status, PegawaiLog $pegawaiLog)
	{
		$pegawai_log = $pegawaiLog->where('pegawai_id',$id)->whereIn('status',[0,1])->first();
		$pegawai_log->status = $status;
		$pegawai_log->save();

		$arr = $pegawai_log->toArray();
		$pegawai = Pegawai::findOrFail($id);
		$pegawai->update($arr);

		flashy()->success('Berhasil menyimpan data ke data master');
		return back();
	}

	public function approvePendidikan($pegawai, $id, RiwayatPendidikanLog $riwayatPendidikanLog)
	{
		$pendidikan_log = $riwayatPendidikanLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->first();
		$pendidikan_log->status = 1;
		$pendidikan_log->save();

		$arr = $pendidikan_log->toArray();
		unset($arr['status']);
		unset($arr['id']);
		RiwayatPendidikan::insert($arr);

		flashy()->success('Berhasil menyimpan data ke data master');
		return back();
	}

	public function removePendidikan($pegawai, $id, RiwayatPendidikanLog $riwayatPendidikanLog)
	{
		$pendidikan_log = $riwayatPendidikanLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->delete();

		flashy()->success('Berhasil menghapus data');
		return back();
	}

	public function approveDiklat($pegawai, $id, RiwayatDiklatLog $riwayatDiklatLog)
	{
		$diklat_log = $riwayatDiklatLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->first();
		$diklat_log->status = 1;
		$diklat_log->save();

		$arr = $diklat_log->toArray();
		unset($arr['status']);
		unset($arr['id']);
		RiwayatDiklat::insert($arr);

		flashy()->success('Berhasil menyimpan data ke data master');
		return back();
	}

	public function removeDiklat($pegawai, $id, RiwayatDiklatLog $riwayatDiklatLog)
	{
		$diklat_log = $riwayatDiklatLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->delete();

		flashy()->success('Berhasil menghapus data');
		return back();
	}

	public function approveKursus($pegawai, $id, RiwayatKursusLog $riwayatKursusLog)
	{
		$kursus_log = $riwayatKursusLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->first();
		$kursus_log->status = 1;
		$kursus_log->save();

		$arr = $kursus_log->toArray();
		unset($arr['status']);
		unset($arr['id']);
		RiwayatKursus::insert($arr);

		flashy()->success('Berhasil menyimpan data ke data master');
		return back();
	}

	public function removeKursus($pegawai, $id, RiwayatKursusLog $riwayatKursusLog)
	{
		$kursus_log = $riwayatKursusLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->delete();

		flashy()->success('Berhasil menghapus data');
		return back();
	}

	public function approvePenghargaan($pegawai, $id, RiwayatPenghargaanLog $riwayatPenghargaanLog)
	{
		$penghargaan_log = $riwayatPenghargaanLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->first();
		$penghargaan_log->status = 1;
		$penghargaan_log->save();

		$arr = $penghargaan_log->toArray();
		unset($arr['status']);
		unset($arr['id']);
		RiwayatPenghargaan::insert($arr);

		flashy()->success('Berhasil menyimpan data ke data master');
		return back();
	}

	public function removePenghargaan($pegawai, $id, RiwayatPenghargaanLog $riwayatPenghargaanLog)
	{
		$penghargaan_log = $riwayatPenghargaanLog->where('pegawai_id',$pegawai)->where('id',$id)->whereIn('status',[0])->delete();

		flashy()->success('Berhasil menghapus data');
		return back();
	}
}