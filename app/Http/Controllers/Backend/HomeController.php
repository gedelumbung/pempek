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
		$ykeys = [
			'jabatan' => [],
			'pendidikan' => [],
			'jenis_kelamin' => [],
			'usia' => [],
			'masa_kerja' => [],
			'agama' => [],
		];
		foreach ($temp as $key => $value) {
			foreach ($golongan as $gol) {
				array_push($temp[$key], ['title' => $gol->title, 'id' => $gol->id]);
			}
		}

		//agama chart data
		foreach ($temp['agama'] as $key=>$t) {
			foreach (config('simpeg.agama') as $agama) {
				$temp['agama'][$key][$agama] = '';
	        	$ag = DB::select(DB::raw("SELECT * FROM pegawai WHERE golongan_id_akhir = '".$t['id']."' AND agama = '".$agama."'"));
	        	$temp['agama'][$key][$agama] = count($ag);
			}
		}

		foreach (config('simpeg.agama') as $agama) {
			array_push($ykeys['agama'], $agama);
		}

		//pendidikan chart data
		foreach ($temp['pendidikan'] as $key=>$t) {
			foreach (config('simpeg.pendidikan') as $pendidikan) {
				$temp['pendidikan'][$key][$pendidikan] = '';
	        	$ag = DB::select(DB::raw("SELECT * FROM pegawai WHERE golongan_id_akhir = '".$t['id']."' AND pendidikan_akhir = '".$pendidikan."'"));
	        	$temp['pendidikan'][$key][$pendidikan] = count($ag);
			}
		}

		foreach (config('simpeg.pendidikan') as $pendidikan) {
			array_push($ykeys['pendidikan'], $pendidikan);
		}

		//jabatan chart data
		foreach ($temp['jabatan'] as $key=>$t) {
			foreach (config('simpeg.jenis_jabatan') as $jabatan) {
				$temp['jabatan'][$key][$jabatan] = '';
	        	$ag = DB::select(DB::raw("SELECT * FROM pegawai WHERE golongan_id_akhir = '".$t['id']."' AND jenis_jabatan = '".$jabatan."'"));
	        	$temp['jabatan'][$key][$jabatan] = count($ag);
			}
		}

		foreach (config('simpeg.jenis_jabatan') as $jabatan) {
			array_push($ykeys['jabatan'], $jabatan);
		}

		//jenis kelamin chart data
		foreach ($temp['jenis_kelamin'] as $key=>$t) {
			foreach (config('simpeg.jenis_kelamin') as $jenis_kelamin) {
				$temp['jenis_kelamin'][$key][$jenis_kelamin] = '';
	        	$ag = DB::select(DB::raw("SELECT * FROM pegawai WHERE golongan_id_akhir = '".$t['id']."' AND jenis_kelamin = '".$jenis_kelamin."'"));
	        	$temp['jenis_kelamin'][$key][$jenis_kelamin] = count($ag);
			}
		}

		foreach (config('simpeg.jenis_kelamin') as $jenis_kelamin) {
			array_push($ykeys['jenis_kelamin'], $jenis_kelamin);
		}

		//return json_encode($ykeys['agama'], 200);
		return view('backend.home.index', compact('count_all','count_all_not_completed','golongan','pegawai','temp','ykeys'));
	}
}