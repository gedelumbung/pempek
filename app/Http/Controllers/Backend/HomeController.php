<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\Golongan;

/**
* Home Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class HomeController extends Controller
{
	
	public function index(Pegawai $pegawai, Golongan $golongan)
	{
		$count_all = $pegawai->count();
		$count_all_not_completed = $pegawai->whereRaw('count_progress <=61')->count();
		$golongan = $golongan->get();
		$golongan = $golongan->pluck('title')->all();
		return view('backend.home.index', compact('count_all','count_all_not_completed','golongan'));
	}
}