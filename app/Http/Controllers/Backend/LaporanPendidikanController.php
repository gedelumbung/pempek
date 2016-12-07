<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;

/**
* Laporan Pendidikan Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanPendidikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:konfigurasi-pendidikan');
    }
	
	public function index(UnitKerja $unitKerja)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.pendidikan', compact('unit_kerja'));
	}
	
	public function prints(UnitKerja $unitKerja)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.pendidikan_cetak', compact('unit_kerja'));
	}
}