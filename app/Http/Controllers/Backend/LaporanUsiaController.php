<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;

/**
* Laporan Usia Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanUsiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:konfigurasi-usia');
    }
	
	public function index(UnitKerja $unitKerja)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.usia', compact('unit_kerja'));
	}
	
	public function prints($type, UnitKerja $unitKerja)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.usia_cetak', compact('unit_kerja', 'type'));
	}
}