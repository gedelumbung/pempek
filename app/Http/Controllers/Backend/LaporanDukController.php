<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\DukView;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\Golongan;
use Illuminate\Http\Request;
use DB;
use PDF;

/**
* Laporan Duk Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class LaporanDukController extends Controller
{
	
	public function index(Request $request, DukView $dukView, UnitKerja $unitKerjaData, Golongan $golonganData)
	{
		extract($request->only('unit_kerja', 'golongan', 'age_start', 'age_end'));
		$uri = http_build_query($request->query());
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

        $nama = "laporan-duk-".date('d-M-Y').".pdf";
        $pdf = PDF::loadView('backend.laporan.duk_cetak', compact('duk'))->setPaper('a3', 'landscape');
        return $pdf->download($nama);
	}

	public function fetchNewData(DukView $dukView)
	{
		$dukView->truncate();
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
		return redirect(route('dashboard.laporan.duk'));
	}
}