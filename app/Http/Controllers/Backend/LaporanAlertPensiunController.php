<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Illuminate\Http\Request;
use DB;

/**
* Laporan Alert Pensiun Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanAlertPensiunController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:alert-pensiun');
    }
	
	public function index(Pegawai $pegawai)
	{
		$pegawai = $pegawai->get();
		return view('backend.laporan.alert_pensiun', compact('pegawai'));
	}
}