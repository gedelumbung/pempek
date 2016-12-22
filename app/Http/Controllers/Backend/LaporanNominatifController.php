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
        $this->middleware('role:nominatif');
    }
	
	public function index(Request $request, UnitKerja $unitKerja, Golongan $golonganData)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end', 'kedudukan_pns', 'status_pegawai'));
		$uri = http_build_query($request->query());

		$golongan_data = $golonganData->get();
		$unit_kerja_data = $unitKerja->where('parent_id', 0)->get();

		$unitKerja = $unitKerja->where('parent_id',0)
								->with(array(
									'duk' => function($query) use($unit_kerja,$golongan,$age_start,$age_end,$kedudukan_pns,$status_pegawai)
											{
												$query = empty($unit_kerja) ? $query : $query->where('unit_kerja_id', $unit_kerja);
												$query = empty($golongan) ? $query : $query->where('golongan', $golongan);
												$query = empty($kedudukan_pns) ? $query : $query->where('kedudukan_pns', $kedudukan_pns);
												$query = empty($status_pegawai) ? $query : $query->where('status_pegawai', $status_pegawai);
												$query = empty($age_start) ? $query : $query->whereRaw('usia >= '.$age_start);
												$query = empty($age_end) ? $query : $query->whereRaw('usia <= '.$age_end);
											}
										)
									);

		$unitKerja = $unitKerja->get();

		return view('backend.laporan.nominatif', compact('unitKerja', 'golongan_data', 'unit_kerja_data', 'unit_kerja', 'golongan', 'age_start', 'age_end', 'uri', 'status_pegawai', 'kedudukan_pns'));
	}
	
	public function prints(Request $request, UnitKerja $unitKerja)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end', 'kedudukan_pns', 'status_pegawai'));
		$uri = http_build_query($request->query());

		$unitKerja = $unitKerja->where('parent_id',0)
								->with(array(
									'duk' => function($query) use($unit_kerja,$golongan,$age_start,$age_end)
											{
												$query = empty($unit_kerja) ? $query : $query->where('unit_kerja_id', $unit_kerja);
												$query = empty($golongan) ? $query : $query->where('golongan', $golongan);
												$query = empty($kedudukan_pns) ? $query : $query->where('kedudukan_pns', $kedudukan_pns);
												$query = empty($status_pegawai) ? $query : $query->where('status_pegawai', $status_pegawai);
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
			//pangkat order
			$duk->golongan = $data->golongan_akhir->title;

			//jabatan order
			if (!empty($data->jabatan_struktural_id)) {
				$duk->level = $data->jabatan_struktural->level;
			}
			$duk->eselon = $data->eselon;
			if ($data->jenis_jabatan == 'Struktural') {
				$duk->jenis_jabatan_level = 2;
				$duk->tmt_jabatan_eselon = $data->tmt_eselon;
			} elseif ($data->jenis_jabatan == 'Fungsional Tertentu') {
				$duk->jenis_jabatan_level = 1;
				$duk->tmt_jabatan_eselon = $data->tmt_jabatan_fungsional_tertentu;
			} elseif ($data->jenis_jabatan == 'Fungsional Umum') {
				$duk->jenis_jabatan_level = 1;
				$duk->tmt_jabatan_eselon = $data->tmt_jabatan_fungsional_umum;
			}

			//masa kerja order
			$duk->masa_kerja = $data->masa_kerja();

			//latihan jabatan order
			$duk->sepada = $data->tahun_diklat_sepada;
			$duk->sepala = $data->tahun_diklat_sepala;
			$duk->sepadya = $data->tahun_diklat_sepadya;
			$duk->spamen = $data->tahun_diklat_spamen;
			$duk->sepati = $data->tahun_diklat_sepati;

			//pendidikan order
			$duk->level_pendidikan = $data->level_pendidikan();
			$duk->tahun_pendidikan = $data->pendidikan_akhir_tahun_lulus;

			//usia order
			$duk->usia = $data->age();

			$duk->status_pegawai = $data->status_pegawai;
			$duk->kedudukan_pns = $data->kedudukan_pns;
			$duk->unit_kerja_id = $data->unit_kerja_id;
			$duk->save();
		}
		flashy()->success('Berhasil memperbaharui data.');
		return redirect(route('dashboard.laporan.nominatif'));
	}
}