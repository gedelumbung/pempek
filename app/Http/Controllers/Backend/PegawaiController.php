<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\Golongan;

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

	public function add(UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->get();
		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}
}