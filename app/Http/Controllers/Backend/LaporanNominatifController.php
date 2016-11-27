<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\DukView;
use Simpeg\Model\UnitKerja;
use Illuminate\Http\Request;
use DB;

/**
* Laporan Nominatif Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanNominatifController extends Controller
{
	
	public function index(DukView $duk, UnitKerja $unitKerja)
	{
		//DukView::truncate();
		//$this->fetchNewData();
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		return view('backend.laporan.nominatif', compact('unit_kerja'));
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