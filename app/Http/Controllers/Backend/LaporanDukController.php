<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\DukView;
use Illuminate\Http\Request;
use DB;

/**
* Laporan Duk Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanDukController extends Controller
{
	
	public function index(DukView $duk)
	{
		DB::table('duk_view')->truncate();
		$this->fetchNewData();
		$duk = $duk->orderBy('golongan_id', 'desc')
					->orderBy('usia', 'desc')
					->orderBy('level', 'desc')
					->orderBy('masa_kerja', 'desc')
					->orderBy('jumlah_diklat', 'desc')
					->orderBy('pendidikan', 'desc')
					->get();
		return view('backend.laporan.duk', compact('duk'));
	}

	protected function fetchNewData()
	{
		$pegawai = Pegawai::get();
		foreach ($pegawai as $key => $data) {
			$duk = new DukView();
			$duk->pegawai_id = $data->id;
			$duk->golongan_id = $data->golongan_id_akhir;
			$duk->usia = $data->age();
			$duk->unit_kerja_id = $data->unit_kerja_id;
			$duk->level = $data->jabatan_struktural_id;
			$duk->masa_kerja = $data->masa_kerja_tahun;
			$duk->jumlah_diklat = $data->golongan_id_akhir;
			$duk->pendidikan = $data->pendidikan_akhir;
			$duk->save();
		}
	}
}