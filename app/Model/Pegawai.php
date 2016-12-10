<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DB;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $casts = [
        'features' => 'json'
    ];

    protected $fillable = [
        'nip',
        'nama_lengkap',
        'gelar_depan',
        'gelar_belakang',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'status_pernikahan',
        'email',
        'alamat',
        'kode_pos',
        'telepon',
        'handphone',
        'kedudukan_pns',
        'status_pegawai',
        'tmt_cpns',
        'tmt_pns',
        'pendidikan_awal_cpns',
        'pendidikan_akhir',
        'tahun_diklat_sepada',
        'tahun_diklat_sepala',
        'tahun_diklat_sepadya',
        'tahun_diklat_spamen',
        'tahun_diklat_sepati',
        'pendidikan_akhir_fakultas',
        'pendidikan_akhir_jurusan',
        'pendidikan_akhir_tahun_lulus',
        'unit_organisasi',
        'jenis_jabatan',
        'unit_kerja_id',
        'sub_unit_kerja_id',
        'satuan_kerja_id',
        'jabatan_struktural_id',
        'eselon',
        'tmt_eselon',
        'jabatan_fungsional_tertentu',
        'tmt_jabatan_fungsional_tertentu',
        'jabatan_fungsional_umum',
        'tmt_jabatan_fungsional_umum',
        'golongan_id_awal',
        'tmt_golongan_awal',
        'golongan_id_akhir',
        'tmt_golongan_akhir',
        'gaji_pokok',
        'masa_kerja_tahun',
        'masa_kerja_bulan',
        'penyesuaian_masa_kerja_tahun',
        'penyesuaian_masa_kerja_bulan',
        'sk_penyesuaian_masa_kerja',
        'no_seri_karpeg',
        'no_seri_kpe',
        'no_seri_karis',
        'no_akte_kelahiran',
        'tahun_no_akte_kelahiran',
        'no_askes',
        'no_taspen',
        'no_npwp',
        'tanggal_npwp',
        'golongan_darah',
        'foto'
    ];

    public function satuan_kerja()
    {
        return $this->belongsTo('Simpeg\Model\SatuanKerja', 'unit_kerja_id');
    }

    public function sub_unit_kerja()
    {
        return $this->belongsTo('Simpeg\Model\UnitKerja', 'sub_unit_kerja_id');
    }

    public function unit_kerja()
    {
        return $this->belongsTo('Simpeg\Model\UnitKerja');
    }

    public function jabatan_struktural()
    {
        return $this->belongsTo('Simpeg\Model\JabatanStruktural');
    }

    public function golongan_awal()
    {
        return $this->belongsTo('Simpeg\Model\Golongan', 'golongan_id_awal');
    }

    public function golongan_akhir()
    {
        return $this->belongsTo('Simpeg\Model\Golongan', 'golongan_id_akhir');
    }

    public function riwayat_diklat()
    {
        return $this->hasMany('Simpeg\Model\RiwayatDiklat')->orderBy('tahun', 'ASC');
    }

    public function riwayat_pendidikan()
    {
        return $this->hasMany('Simpeg\Model\RiwayatPendidikan')->orderBy('tanggal_lulus', 'ASC');
    }

    public function age()
    {
        $birthDate = date('Y-m-d', strtotime($this->tanggal_lahir));
        $date = new DateTime($birthDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    public function pensiun()
    {
        return date("Y-m-d", strtotime(date("Y-m-d", strtotime($this->tanggal_lahir)) . " + 55 years"));
    }

    public function intervalFromNow($date)
    {
        $interval = date_diff(date_create(), date_create($date));
        return $interval->format("%Y tahun %M bulan");
    }
}
