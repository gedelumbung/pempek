<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\DukView;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\Golongan;
use Illuminate\Http\Request;
use DB;

/**
* Laporan Nominatif Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanNominatifController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:laporan');
    }
	
	public function index(Request $request, UnitKerja $unitKerja, Golongan $golonganData)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end'));
		$uri = http_build_query($request->query());

		$golongan_data = $golonganData->get();
		$unit_kerja_data = $unitKerja->where('parent_id', 0)->get();

		$unitKerja = $unitKerja->where('parent_id',0)
								->with(array(
									'duk' => function($query) use($unit_kerja,$golongan,$age_start,$age_end)
											{
												$query = empty($unit_kerja) ? $query : $query->where('unit_kerja_id', $unit_kerja);
												$query = empty($golongan) ? $query : $query->where('golongan', $golongan);
												$query = empty($age_start) ? $query : $query->whereRaw('usia >= '.$age_start);
												$query = empty($age_end) ? $query : $query->whereRaw('usia <= '.$age_end);
											}
										)
									);

		$unitKerja = $unitKerja->get();

		return view('backend.laporan.nominatif', compact('unitKerja', 'golongan_data', 'unit_kerja_data', 'unit_kerja', 'golongan', 'age_start', 'age_end', 'uri'));
	}
	
	public function prints(Request $request, UnitKerja $unitKerja)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end'));
		$uri = http_build_query($request->query());

		$unitKerja = $unitKerja->where('parent_id',0)
								->with(array(
									'duk' => function($query) use($unit_kerja,$golongan,$age_start,$age_end)
											{
												$query = empty($unit_kerja) ? $query : $query->where('unit_kerja_id', $unit_kerja);
												$query = empty($golongan) ? $query : $query->where('golongan', $golongan);
												$query = empty($age_start) ? $query : $query->whereRaw('usia >= '.$age_start);
												$query = empty($age_end) ? $query : $query->whereRaw('usia <= '.$age_end);
											}
										)
									);

		$unitKerja = $unitKerja->get();

		return view('backend.laporan.nominatif_cetak', compact('unitKerja'));
	}

	public function fetchNewData(DukView $dukView)
	{
		$dukView->truncate();
		$pegawai = Pegawai::get();
		foreach ($pegawai as $key => $data) {
			$duk = new DukView();
			$duk->pegawai_id = $data->id;
			//$duk->eselon = $data->eselon;
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
		flashy()->success('Berhasil memperbaharui data.');
		return redirect(route('dashboard.laporan.nominatif'));
	}
}