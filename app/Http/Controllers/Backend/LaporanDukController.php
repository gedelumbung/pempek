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
* Laporan Duk Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanDukController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:duk');
    }
	
	public function index(Request $request, DukView $dukView, UnitKerja $unitKerjaData, Golongan $golonganData)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end'));
		$uri = http_build_query($request->query());
		$duk = $dukView->orderBy('golongan', 'desc')
					->orderBy('level', 'desc')
					->orderBy('eselon', 'desc')
					->orderBy('jenis_jabatan_level', 'desc')
					->orderBy('tmt_jabatan_eselon', 'asc')
					->orderBy('masa_kerja', 'desc')
					->orderBy('sepada', 'asc')
					->orderBy('sepala', 'asc')
					->orderBy('sepadya', 'asc')
					->orderBy('spamen', 'asc')
					->orderBy('sepati', 'asc')
					->orderBy('level_pendidikan', 'desc')
					->orderBy('tahun_pendidikan', 'asc')
					->orderBy('usia', 'desc');

		$duk = empty($unit_kerja) ? $duk : $duk->where('unit_kerja_id', $unit_kerja);
		$duk = empty($golongan) ? $duk : $duk->where('golongan', $golongan);
		$duk = empty($age_start) ? $duk : $duk->whereRaw('usia >= '.$age_start);
		$duk = empty($age_end) ? $duk : $duk->whereRaw('usia <= '.$age_end);

		$duk = $duk->get();
		$golongan_data = $golonganData->get();
		$unit_kerja_data = $unitKerjaData->where('parent_id', 0)->get();
		return view('backend.laporan.duk', compact('duk', 'golongan_data', 'unit_kerja_data', 'unit_kerja', 'golongan', 'age_start', 'age_end', 'uri'));
	}
	
	public function prints(Request $request, DukView $dukView)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end'));
		$duk = $dukView->orderBy('golongan', 'desc')
					->orderBy('tmt_golongan', 'desc')
					->orderBy('level', 'desc')
					->orderBy('masa_kerja', 'desc')
					->orderBy('jumlah_diklat', 'desc')
					->orderBy('pendidikan', 'desc')
					->orderBy('usia', 'desc');

		$duk = empty($unit_kerja) ? $duk : $duk->where('unit_kerja_id', $unit_kerja);
		$duk = empty($golongan) ? $duk : $duk->where('golongan', $golongan);
		$duk = empty($age_start) ? $duk : $duk->whereRaw('usia >= '.$age_start);
		$duk = empty($age_end) ? $duk : $duk->whereRaw('usia <= '.$age_end);

		$duk = $duk->get();
		return view('backend.laporan.duk_cetak', compact('duk'));
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

			$duk->unit_kerja_id = $data->unit_kerja_id;
			$duk->save();
		}
		flashy()->success('Berhasil memperbaharui data.');
		return redirect(route('dashboard.laporan.duk'));
	}
}