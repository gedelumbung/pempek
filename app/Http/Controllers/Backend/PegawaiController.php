<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\Golongan;
use Simpeg\Model\RiwayatGolongan;
use Simpeg\Model\RiwayatPendidikan;
use Simpeg\Model\RiwayatJabatan;
use Simpeg\Model\RiwayatDiklat;
use Simpeg\Model\RiwayatKursus;
use Simpeg\Model\RiwayatPenghargaan;
use Illuminate\Http\Request;

/**
* Pegawai Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PegawaiController extends Controller
{
	
	public function index(Pegawai $pegawai)
	{
		$pegawai = $pegawai->paginate(15);
		return view('backend.pegawai.index', compact('pegawai'));
	}

	public function show($id, 
		Pegawai $pegawai, 
		RiwayatGolongan $riwayatGolongan, 
		RiwayatPendidikan $riwayatPendidikan, 
		RiwayatJabatan $riwayatJabatan,
		RiwayatDiklat $riwayatDiklat,
		RiwayatKursus $riwayatKursus,
		RiwayatPenghargaan $riwayatPenghargaan)
	{
		$pegawai = $pegawai->findOrFail($id);
		$riwayat_golongan = $riwayatGolongan->where('pegawai_id', $id)->get();
		$riwayat_pendidikan = $riwayatPendidikan->where('pegawai_id', $id)->get();
		$riwayat_jabatan = $riwayatJabatan->where('pegawai_id', $id)->get();
		$riwayat_diklat = $riwayatDiklat->where('pegawai_id', $id)->get();
		$riwayat_kursus = $riwayatKursus->where('pegawai_id', $id)->get();
		$riwayat_penghargaan = $riwayatPenghargaan->where('pegawai_id', $id)->get();

		return view('backend.pegawai.show', compact('pegawai','riwayat_golongan','riwayat_pendidikan','riwayat_jabatan','riwayat_diklat','riwayat_kursus','riwayat_penghargaan'));
	}

	public function add(UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}

	public function store(Request $request, Pegawai $pegawai)
	{
		$arr = $request->except('_token');
		$pegawai->insert($arr);

		return redirect(route('dashboard.pegawai'));
	}

	public function edit(UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}

	public function delete($id, Pegawai $pegawai)
	{
		$pegawai->findOrFail($id)->delete();
		return redirect(route('dashboard.pegawai'));
	}
}