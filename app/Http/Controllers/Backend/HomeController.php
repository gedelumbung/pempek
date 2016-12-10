<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\Golongan;
use DB;

/**
* Home Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:dashboard');
    }
	
	public function index(Pegawai $pegawai, Golongan $golongan)
	{
		$count_all = $pegawai->count();
		$count_all_not_completed = $pegawai->whereRaw('count_progress <=61')->count();
		$golongan = $golongan->get();

		$temp = [
			'jabatan' => [],
			'pendidikan' => [],
			'jenis_kelamin' => [],
			'usia' => [],
			'masa_kerja' => [],
			'agama' => [],
		];
		foreach ($temp as $key => $value) {
			foreach ($golongan as $gol) {
				array_push($temp[$key], ['title' => $gol->title, 'count' => []]);
			}
		}

		foreach (config('simpeg.agama') as $key=>$agama) {
            $ag = DB::select(DB::raw("SELECT * FROM pegawai WHERE golongan_id_akhir = '".$gol->id."' AND agama = '".$agama."'"));
            array_push($temp['agama']['count'], [$agama => count($ag)]);
		}

		return json_encode($temp['agama'], 200);
		//return view('backend.home.index', compact('count_all','count_all_not_completed','golongan','pegawai','temp'));
	}
}