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
		//DukView::truncate();
		//$this->fetchNewData();
		$duk = $duk->orderBy('golongan', 'desc')
					->orderBy('tmt_golongan', 'desc')
					->orderBy('level', 'desc')
					->orderBy('masa_kerja', 'desc')
					->orderBy('jumlah_diklat', 'desc')
					->orderBy('pendidikan', 'desc')
					->orderBy('usia', 'desc')
					->get();
		return view('backend.laporan.duk', compact('duk'));
	}

	protected function fetchNewData()
	{
		$pegawai = Pegawai::get();
		foreach ($pegawai as $key => $data) {
			$duk = new DukView();
			$duk->pegawai_id = $data->id;
			$duk->golongan = $data->golongan_akhir->title;
			$duk->tmt_golongan = $data->tmt_golongan_akhir;
			$duk->usia = $data->age();
			$duk->unit_kerja_id = $data->unit_kerja_id;

			if (!empty($data->jabatan_struktural_id)) {
				$duk->level = $data->jabatan_struktural->level;
			}
			else {

			}

			$duk->masa_kerja = $data->masa_kerja_tahun;
			$duk->jumlah_diklat = $data->riwayat_diklat->count();
			$duk->pendidikan = $data->pendidikan_akhir;
			$duk->save();
		}
	}
}