<?php

namespace Simpeg\Http\Controllers\Backend;

use Simpeg\Http\Controllers\Controller;
use Simpeg\Model\Pegawai;
use Simpeg\Model\UnitKerja;
use Simpeg\Model\SatuanKerja;
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
use Simpeg\Model\PegawaiLog;
use PDF;
use Image;
use Illuminate\Http\Request;
use Artisan;
use Caffeinated\Shinobi\Models\Role;
use Simpeg\Model\RoleUser;

/**
* Pegawai Controller
* @author Gede Lumbung <gedesumawijaya@gmail.com>
*/
class PegawaiController extends Controller
{
	
	public function index(Request $request, Pegawai $pegawai)
	{
		$this->middleware('role:pegawai-all');
		extract($request->only('kedudukan_pns'));

        $user = \Auth::user()->id;
        $roleUser = RoleUser::where('user_id', $user)->first();
        $role = Role::find($roleUser->role_id);
        $unit_kerja_id = null;

        if ($role->can('unitkerja-ditjen-setditjen')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%ditjen%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-bina-potensi')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%bina potensi%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p3kt')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%p3kt%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-ptt')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%ptt%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p2t')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%p2t%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p3')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title', 'P3')->pluck('id')->toArray();
        }

		$pegawai = empty($kedudukan_pns) ? $pegawai : $pegawai->where('kedudukan_pns', $kedudukan_pns);

        if(empty($unit_kerja_id)){
			$pegawai = $pegawai->get();
        }
        elseif($role->can('unitkerja-ditjen-setditjen') && $role->can('unitkerja-bina-potensi') && $role->can('unitkerja-p3kt') && $role->can('unitkerja-ptt') && $role->can('unitkerja-p2t') && $role->can('unitkerja-p3')){
			$pegawai = $pegawai->get();
        }
        else{
        	$pegawai = $pegawai->whereIn('unit_kerja_id',$unit_kerja_id)->get();
        }
		return view('backend.pegawai.index', compact('pegawai', 'kedudukan_pns'));
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
		$this->middleware('role:pegawai-show');
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
		$this->middleware('role:pegawai-add');

        $user = \Auth::user()->id;
        $roleUser = RoleUser::where('user_id', $user)->first();
        $role = Role::find($roleUser->role_id);
        $unit_kerja_id = null;

        if ($role->can('unitkerja-ditjen-setditjen')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%ditjen%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-bina-potensi')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%bina potensi%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p3kt')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%p3kt%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-ptt')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%ptt%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p2t')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%p2t%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p3')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title', 'P3')->pluck('id')->toArray();
        }

        if(empty($unit_kerja_id)){
			$unit_kerja = $unitKerja->where('parent_id',0)->get();
        }
        elseif($role->can('unitkerja-ditjen-setditjen') && $role->can('unitkerja-bina-potensi') && $role->can('unitkerja-p3kt') && $role->can('unitkerja-ptt') && $role->can('unitkerja-p2t') && $role->can('unitkerja-p3')){
			$unit_kerja = $unitKerja->where('parent_id',0)->get();
        }
        else{
			$unit_kerja = $unitKerja->where('parent_id',0)->where('id',$unit_kerja_id)->get();
        }

		$golongan = $golongan->get();
		return view('backend.pegawai.add', compact('unit_kerja', 'golongan'));
	}

	public function store(Request $request, Pegawai $pegawai, PegawaiLog $pegawaiLog)
	{
		$this->middleware('role:pegawai-add');
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

		if ($arr['jenis_jabatan'] == 'Struktural') {
			$arr['jabatan_fungsional_tertentu'] = null;
			$arr['tmt_jabatan_fungsional_tertentu'] = null;
			$arr['jabatan_fungsional_umum'] = null;
			$arr['tmt_jabatan_fungsional_umum'] = null;
		}
		else if ($arr['jenis_jabatan'] == 'Fungsional Tertentu') {
			$arr['jabatan_struktural_id'] = null;
			$arr['eselon'] = null;
			$arr['tmt_eselon'] = null;
			$arr['jabatan_fungsional_umum'] = null;
			$arr['tmt_jabatan_fungsional_umum'] = null;
		}
		else if ($arr['jenis_jabatan'] == 'Fungsional Umum') {
			$arr['jabatan_struktural_id'] = null;
			$arr['eselon'] = null;
			$arr['tmt_eselon'] = null;
			$arr['jabatan_fungsional_tertentu'] = null;
			$arr['tmt_jabatan_fungsional_tertentu'] = null;
		}

		$pegawaiLog->insert($arr);

		flashy()->success('Berhasil menyimpan data. Data akan divalidasi terlebih dahulu.');
		return redirect(route('dashboard.pegawai'));

		\Artisan::call('simpeg:pegawai:count_progress:single', ['pegawai' => $pegawai->id]);
	}

	public function update(Request $request, Pegawai $pegawai, PegawaiLog $pegawaiLog)
	{
		$this->middleware('role:pegawai-edit');
		$arr = $request->except('_token','input_foto','id');
		extract($request->only('id'));

		if (array_key_exists('foto', $arr) && !empty($arr['foto'])) {

	        $base64_str = substr($arr['foto'], strpos($arr['foto'], ",") + 1);
	        $image = base64_decode($base64_str);
	        $imageName = "pegawai-".$arr['nip']."-".time().".jpg";
	        $path = '/pegawai/'.$imageName;
	        $publichPath = public_path() . $path;

	        Image::make($image)->save($publichPath);
	        $arr['foto'] = $imageName;
		}

		if ($arr['jenis_jabatan'] == 'Struktural') {
			$arr['jabatan_fungsional_tertentu'] = null;
			$arr['tmt_jabatan_fungsional_tertentu'] = null;
			$arr['jabatan_fungsional_umum'] = null;
			$arr['tmt_jabatan_fungsional_umum'] = null;
		}
		else if ($arr['jenis_jabatan'] == 'Fungsional Tertentu') {
			$arr['jabatan_struktural_id'] = null;
			$arr['eselon'] = null;
			$arr['tmt_eselon'] = null;
			$arr['jabatan_fungsional_umum'] = null;
			$arr['tmt_jabatan_fungsional_umum'] = null;
		}
		else if ($arr['jenis_jabatan'] == 'Fungsional Umum') {
			$arr['jabatan_struktural_id'] = null;
			$arr['eselon'] = null;
			$arr['tmt_eselon'] = null;
			$arr['jabatan_fungsional_tertentu'] = null;
			$arr['tmt_jabatan_fungsional_tertentu'] = null;
		}

		$data_pegawai = $pegawai->findOrFail($id);
		if($data_pegawai->unit_kerja_id != $arr['unit_kerja_id'] || !array_key_exists('sub_unit_kerja_id', $arr) || !array_key_exists('sub_unit_kerja_id', $arr)){
			$arr_unit_kerja = [
				'sub_unit_kerja_id' => null,
				'satuan_kerja_id' => null,
			];
			$arr = array_merge($arr, array('sub_unit_kerja_id' => null,'satuan_kerja_id' => null));
		}

		if ($data_pegawai->pendidikan_akhir != $arr['pendidikan_akhir']) {
			$pegawai_log = $pegawaiLog->where('pegawai_id', $id)->first();
			if (empty($pegawai_log)) {
				$arr['pegawai_id'] = $id;
				$pegawaiLog->insert($arr);
			}
			else {
				$log = $pegawaiLog->where('pegawai_id', $id)->first();
				$arr['pegawai_id'] = $id;
				$arr['status'] = 0;
				$log->update($arr);
			}

			flashy()->success('Berhasil menyimpan data. Data akan divalidasi terlebih dahulu.');
			return redirect(route('dashboard.pegawai'));
		}
		else {
			$data_pegawai->update($arr);

			//update log
			$log = $pegawaiLog->where('pegawai_id', $id)->first();
			if (!empty($log)) {
				$log->update($arr);
			}

			\Artisan::call('simpeg:pegawai:count_progress:single', ['pegawai' => $id]);

			flashy()->success('Berhasil menyimpan data.');
			return redirect(route('dashboard.pegawai'));
		}
	}

	public function edit($id, Pegawai $pegawai, UnitKerja $unitKerja, Golongan $golongan, SatuanKerja $satuanKerja)
	{
		$this->middleware('role:pegawai-edit');

        $user = \Auth::user()->id;
        $roleUser = RoleUser::where('user_id', $user)->first();
        $role = Role::find($roleUser->role_id);
        $unit_kerja_id = null;

        if ($role->can('unitkerja-ditjen-setditjen')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%ditjen%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-bina-potensi')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%bina potensi%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p3kt')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%p3kt%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-ptt')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%ptt%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p2t')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title','like', '%p2t%')->pluck('id')->toArray();
        } elseif ($role->can('unitkerja-p3')) {
            $unit_kerja_id = UnitKerja::where('parent_id',0)->where('title', 'P3')->pluck('id')->toArray();
        }

        if(empty($unit_kerja_id)){
			$unit_kerja = $unitKerja->where('parent_id',0)->get();
        }
        elseif($role->can('unitkerja-ditjen-setditjen') && $role->can('unitkerja-bina-potensi') && $role->can('unitkerja-p3kt') && $role->can('unitkerja-ptt') && $role->can('unitkerja-p2t') && $role->can('unitkerja-p3')){
			$unit_kerja = $unitKerja->where('parent_id',0)->get();
        }
        else{
			$unit_kerja = $unitKerja->where('parent_id',0)->where('id',$unit_kerja_id)->get();
        }
        
		$golongan = $golongan->get();
		$pegawai = $pegawai->findOrFail($id);
		$sub_unit_kerja = $unitKerja->where('parent_id',$pegawai->unit_kerja_id)->get();
		$satuan_kerja = $satuanKerja->where('unit_kerja_id',$pegawai->sub_unit_kerja_id)->get();
		return view('backend.pegawai.edit', compact('pegawai','unit_kerja','golongan','sub_unit_kerja','satuan_kerja'));
	}

	public function delete($id, Pegawai $pegawai)
	{
		$this->middleware('role:pegawai-delete');
		$pegawai->findOrFail($id)->delete();
		flashy()->success('Berhasil menghapus data.');
		return redirect(route('dashboard.pegawai'));
	}
}