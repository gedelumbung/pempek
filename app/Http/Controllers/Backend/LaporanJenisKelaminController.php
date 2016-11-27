<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;
use DB;

/**
* Laporan Jenis Kelamin Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanJenisKelaminController extends Controller
{
	
	public function index(UnitKerja $unitKerja)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.jenis_kelamin', compact('unit_kerja'));
	}
}