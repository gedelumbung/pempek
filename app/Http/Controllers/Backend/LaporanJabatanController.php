<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;
use DB;

/**
* Laporan Jabatan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanJabatanController extends Controller
{
	
	public function index(UnitKerja $unitKerja)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.jabatan', compact('unit_kerja'));
	}
}