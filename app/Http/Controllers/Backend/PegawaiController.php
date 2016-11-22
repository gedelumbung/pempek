<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\Golongan;
use Simpeg\Model\RiwayatGolongan;
use Simpeg\Model\RiwayatPendidikan;
use Simpeg\Model\RiwayatJabatan;
use Simpeg\Model\RiwayatDiklat;
use Simpeg\Model\RiwayatKursus;
use Simpeg\Model\RiwayatPenghargaan;
use Simpeg\Model\Anak;
use Simpeg\Model\Pasangan;
use Simpeg\Model\Ayah;
use Simpeg\Model\Ibu;
use PDF;
use Image;
use Illuminate\Http\Request;

/**
* Pegawai Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PegawaiController extends Controller
{
	
	public function index(Pegawai $pegawai)
	{
		$pegawai = $pegawai->paginate(15);
		return view('backend.pegawai.index', compact('pegawai'));
	}

	public function show($id, 
		Pegawai $pegawai, 
		RiwayatGolongan $riwayatGolongan, 
		RiwayatPendidikan $riwayatPendidikan, 
		RiwayatJabatan $riwayatJabatan,
		RiwayatDiklat $riwayatDiklat,
		RiwayatKursus $riwayatKursus,
		RiwayatPenghargaan $riwayatPenghargaan,
		Anak $anak,
		Pasangan $pasangan,
		Ayah $ayah,
		Ibu $ibu)
	{
		$pegawai = $pegawai->findOrFail($id);
		$riwayat_golongan = $riwayatGolongan->where('pegawai_id', $id)->get();
		$riwayat_pendidikan = $riwayatPendidikan->where('pegawai_id', $id)->get();
		$riwayat_jabatan = $riwayatJabatan->where('pegawai_id', $id)->get();
		$riwayat_diklat = $riwayatDiklat->where('pegawai_id', $id)->get();
		$riwayat_kursus = $riwayatKursus->where('pegawai_id', $id)->get();
		$riwayat_penghargaan = $riwayatPenghargaan->where('pegawai_id', $id)->get();
		$anak = $anak->where('pegawai_id', $id)->get();
		$pasangan = $pasangan->where('pegawai_id', $id)->first();
		$ayah = $ayah->where('pegawai_id', $id)->first();
		$ibu = $ibu->where('pegawai_id', $id)->first();

		return view('backend.pegawai.show', compact('pegawai','riwayat_golongan','riwayat_pendidikan','riwayat_jabatan','riwayat_diklat','riwayat_kursus','riwayat_penghargaan','anak','pasangan','ayah','ibu'));
	}

	public function prints($id, 
		Pegawai $pegawai, 
		RiwayatGolongan $riwayatGolongan, 
		RiwayatPendidikan $riwayatPendidikan, 
		RiwayatJabatan $riwayatJabatan,
		RiwayatDiklat $riwayatDiklat,
		RiwayatKursus $riwayatKursus,
		RiwayatPenghargaan $riwayatPenghargaan,
		Anak $anak,
		Pasangan $pasangan,
		Ayah $ayah,
		Ibu $ibu)
	{
		$pegawai = $pegawai->findOrFail($id);
		$riwayat_golongan = $riwayatGolongan->where('pegawai_id', $id)->get();
		$riwayat_pendidikan = $riwayatPendidikan->where('pegawai_id', $id)->get();
		$riwayat_jabatan = $riwayatJabatan->where('pegawai_id', $id)->get();
		$riwayat_diklat = $riwayatDiklat->where('pegawai_id', $id)->get();
		$riwayat_kursus = $riwayatKursus->where('pegawai_id', $id)->get();
		$riwayat_penghargaan = $riwayatPenghargaan->where('pegawai_id', $id)->get();
		$anak = $anak->where('pegawai_id', $id)->get();
		$pasangan = $pasangan->where('pegawai_id', $id)->first();
		$ayah = $ayah->where('pegawai_id', $id)->first();
		$ibu = $ibu->where('pegawai_id', $id)->first();

        $nama = str_replace(" ","",($pegawai->nip))."-".str_replace(" ","_",($pegawai->nama_lengkap)).".pdf";
        $pdf = PDF::loadView('backend.pegawai.print', compact('pegawai','riwayat_golongan','riwayat_pendidikan','riwayat_jabatan','riwayat_diklat','riwayat_kursus','riwayat_penghargaan','anak','pasangan','ayah','ibu'))->setPaper('a4', 'portrait');
        return $pdf->download($nama);
	}

	public function add(UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}

	public function store(Request $request, Pegawai $pegawai)
	{
		$arr = $request->except('_token','input_foto');

		if (array_key_exists('foto', $arr) && !empty($arr['foto'])) {

	        $base64_str = substr($arr['foto'], strpos($arr['foto'], ",") + 1);
	        $image = base64_decode($base64_str);
	        $imageName = "pegawai-".$arr['nip']."-".time().".jpg";
	        $path = '/pegawai/'.$imageName;
	        $publichPath = public_path() . $path;

	        Image::make($image)->save($publichPath);
	        $arr['foto'] = $imageName;
		}

		$pegawai->insert($arr);

		return redirect(route('dashboard.pegawai'));
	}

	public function edit($id, Pegawai $pegawai, UnitKerja $unitKerja, Golongan $golongan)
	{
		$unit_kerja = $unitKerja->where('parent_id',0)->get();
		$golongan = $golongan->get();
		$pegawai = $pegawai->findOrFail($id);
		return view('backend.pegawai.edit', compact('pegawai','unit_kerja','golongan'));
	}

	public function delete($id, Pegawai $pegawai)
	{
		$pegawai->findOrFail($id)->delete();
		return redirect(route('dashboard.pegawai'));
	}
}