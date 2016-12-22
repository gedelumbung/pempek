<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;
use Simpeg\Model\Pegawai;
use Simpeg\Model\JabatanStruktural;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';

    protected $fillable = [
        'title',
        'description'
    ];

    public function jabatan()
    {
        return $this->hasMany('Simpeg\Model\JabatanStruktural', 'unit_kerja_id', 'id');
    }

    public function pegawai()
    {
        return $this->hasMany('Simpeg\Model\Pegawai', 'unit_kerja_id', 'id');
    }

    public function sub_unit_kerja()
    {
        return $this->hasMany('Simpeg\Model\UnitKerja', 'parent_id', 'id');
    }

    public function list_jabatan_level($unit_kerja_id, $parent_level)
    {
        return JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->where('parent_level', $parent_level)->pluck('id')->toArray();
    }

    public function duk()
    {
        return $this->hasMany('Simpeg\Model\DukView')->orderBy('golongan', 'desc')
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
    }

    public function countParentPegawaiByPendidikan($unit_kerja_id, $pendidikan)
    {
        $child_list_id = JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->pluck('id')->toArray();
        return Pegawai::whereIn('jabatan_struktural_id', $child_list_id)
                    ->where('pendidikan_akhir', $pendidikan)
                    ->count();
    }

    public function countSubPegawaiByPendidikan($jabatan_struktural_id, $pendidikan)
    {
        $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->pluck('id')->toArray();
        $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->pluck('id')->toArray();
        $merge = array_merge($child_list_id,$parent_list_id);

        return Pegawai::whereIn('jabatan_struktural_id', $merge)
                    ->where('pendidikan_akhir', $pendidikan)
                    ->count();
    }

    public function countParentPegawaiByJabatan($jenis_jabatan, $unit_kerja_id=null, $golongan=array())
    {
        $child_list_id = JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->pluck('id')->toArray();
        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
    }

    public function countSubPegawaiByJabatan($jenis_jabatan, $jabatan_struktural_id=null, $golongan=array())
    {
        $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->pluck('id')->toArray();
        $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->pluck('id')->toArray();
        $merge = array_merge($child_list_id,$parent_list_id);
        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
    }

    public function countParentPegawaiByJenisKelamin($unit_kerja_id, $golongan=array(), $jenis_kelamin)
    {
        $child_list_id = JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->pluck('id')->toArray();

        return Pegawai::whereIn('jabatan_struktural_id', $child_list_id)
                ->whereIn('golongan_id_akhir', $golongan)
                ->where('jenis_kelamin', $jenis_kelamin)
                ->count();
    }

    public function countSubPegawaiByJenisKelamin($jabatan_struktural_id=null, $golongan=array(), $jenis_kelamin)
    {
        $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->pluck('id')->toArray();
        $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->pluck('id')->toArray();
        $merge = array_merge($child_list_id,$parent_list_id);

        return Pegawai::whereIn('jabatan_struktural_id', $merge)
                ->whereIn('golongan_id_akhir', $golongan)
                ->where('jenis_kelamin', $jenis_kelamin)
                ->count();
    }

    public function countParentPegawaiByUsiaEselon($jenis_jabatan='fungsional', $eselon, $unit_kerja_id, $usia_start, $usia_end)
    {
        $child_list_id = JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->pluck('id')->toArray();

        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->whereHas('duk', function($q) use($usia_start, $usia_end){
                        $q->whereBetween('usia', [$usia_start, $usia_end]);
                    })
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->where('eselon', $eselon)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->whereHas('duk', function($q) use($usia_start, $usia_end){
                        $q->whereBetween('usia', [$usia_start, $usia_end]);
                    })
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->count();
        }
    }

    public function countSubPegawaiByUsiaEselon($jenis_jabatan='fungsional', $eselon, $jabatan_struktural_id=null, $usia_start, $usia_end)
    {
        $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->pluck('id')->toArray();
        $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->pluck('id')->toArray();
        $merge = array_merge($child_list_id,$parent_list_id);

        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->whereHas('duk', function($q) use($usia_start, $usia_end){
                        $q->whereBetween('usia', [$usia_start, $usia_end]);
                    })
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->where('eselon', $eselon)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->whereHas('duk', function($q) use($usia_start, $usia_end){
                        $q->whereBetween('usia', [$usia_start, $usia_end]);
                    })
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->count();
        }
    }

    public function countSubPegawaiByFormasi($parent=false, $jabatan_struktural_id=null, $eselon)
    {
        if($parent){
            $child_list_id = JabatanStruktural::where('unit_kerja_id', $jabatan_struktural_id)->where('eselon', $eselon)->pluck('id')->toArray();
            return count($child_list_id);
        }
        else {
            $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->where('eselon', $eselon)->pluck('id')->toArray();
            $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->where('eselon', $eselon)->pluck('id')->toArray();
            $merge = array_merge($child_list_id,$parent_list_id);
            return count($merge);
        }
    }

    public function countSubPegawaiByTerisi($parent=false, $jabatan_struktural_id=null, $eselon)
    {
        if($parent){
            $child_list_id = JabatanStruktural::where('unit_kerja_id', $jabatan_struktural_id)->where('eselon', $eselon)->pluck('id')->toArray();

            return Pegawai::whereIn('jenis_jabatan', ['Struktural'])
                    ->where('eselon', $eselon)
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->count();
        }
        else {
            $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->where('eselon', $eselon)->pluck('id')->toArray();
            $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->where('eselon', $eselon)->pluck('id')->toArray();
            $merge = array_merge($child_list_id,$parent_list_id);

            return Pegawai::whereIn('jenis_jabatan', ['Struktural'])
                    ->where('eselon', $eselon)
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->count();
        }
    }
}
