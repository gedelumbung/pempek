<?php

namespace Simpeg\Console\Commands;

use Illuminate\Console\Command;
use Simpeg\Model\Pegawai;
use DB;

class CountProgressSinglePegawai extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simpeg:pegawai:count_progress:single {pegawai}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count Pegawai Progress';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pegawaiId = $this->argument('pegawai');
        $pegawai = Pegawai::findOrFail($pegawaiId);
        $count = DB::select("SELECT id,
                 CASE WHEN nip != '' THEN 1 ELSE 0 END + 
                 CASE WHEN nama_lengkap != '-' THEN 1 ELSE 0 END + 
                 CASE WHEN gelar_depan != '' THEN 1 ELSE 0 END + 
                 CASE WHEN gelar_belakang != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tempat_lahir != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tanggal_lahir != '' THEN 1 ELSE 0 END + 
                 CASE WHEN agama != '' THEN 1 ELSE 0 END + 
                 CASE WHEN jenis_kelamin != '' THEN 1 ELSE 0 END + 
                 CASE WHEN status_pernikahan != '' THEN 1 ELSE 0 END + 
                 CASE WHEN email != '' THEN 1 ELSE 0 END + 
                 CASE WHEN alamat != '' THEN 1 ELSE 0 END + 
                 CASE WHEN kode_pos != '' THEN 1 ELSE 0 END + 
                 CASE WHEN telepon != '' THEN 1 ELSE 0 END + 
                 CASE WHEN handphone != '' THEN 1 ELSE 0 END + 
                 CASE WHEN kedudukan_pns != '' THEN 1 ELSE 0 END + 
                 CASE WHEN status_pegawai != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_cpns != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_pns != '' THEN 1 ELSE 0 END + 
                 CASE WHEN pendidikan_awal_cpns != '' THEN 1 ELSE 0 END + 
                 CASE WHEN pendidikan_akhir != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tahun_diklat_sepada != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tahun_diklat_sepala != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tahun_diklat_sepadya != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tahun_diklat_spamen != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tahun_diklat_sepati != '' THEN 1 ELSE 0 END + 
                 CASE WHEN pendidikan_akhir_fakultas != '' THEN 1 ELSE 0 END + 
                 CASE WHEN pendidikan_akhir_jurusan != '' THEN 1 ELSE 0 END + 
                 CASE WHEN pendidikan_akhir_tahun_lulus != '' THEN 1 ELSE 0 END + 
                 CASE WHEN foto != '' THEN 1 ELSE 0 END + 
                 CASE WHEN unit_organisasi != '' THEN 1 ELSE 0 END + 
                 CASE WHEN jenis_jabatan != '' THEN 1 ELSE 0 END + 
                 CASE WHEN unit_kerja_id != '' THEN 1 ELSE 0 END + 
                 CASE WHEN sub_unit_kerja_id != '' THEN 1 ELSE 0 END + 
                 CASE WHEN satuan_kerja_id != '' THEN 1 ELSE 0 END + 
                 CASE WHEN jabatan_struktural_id != '' THEN 1 ELSE 0 END + 
                 CASE WHEN eselon != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_eselon != '' THEN 1 ELSE 0 END + 
                 CASE WHEN jabatan_fungsional_tertentu != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_jabatan_fungsional_tertentu != '' THEN 1 ELSE 0 END + 
                 CASE WHEN jabatan_fungsional_umum != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_jabatan_fungsional_umum != '' THEN 1 ELSE 0 END + 
                 CASE WHEN golongan_id_awal != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_golongan_awal != '' THEN 1 ELSE 0 END + 
                 CASE WHEN golongan_id_akhir != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tmt_golongan_akhir != '' THEN 1 ELSE 0 END + 
                 CASE WHEN gaji_pokok != '' THEN 1 ELSE 0 END + 
                 CASE WHEN masa_kerja_tahun != '' THEN 1 ELSE 0 END + 
                 CASE WHEN masa_kerja_bulan != '' THEN 1 ELSE 0 END + 
                 CASE WHEN penyesuaian_masa_kerja_tahun != '' THEN 1 ELSE 0 END + 
                 CASE WHEN penyesuaian_masa_kerja_bulan != '' THEN 1 ELSE 0 END + 
                 CASE WHEN sk_penyesuaian_masa_kerja != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_seri_karpeg != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_seri_kpe != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_seri_karis != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_akte_kelahiran != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tahun_no_akte_kelahiran != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_askes != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_taspen != '' THEN 1 ELSE 0 END + 
                 CASE WHEN no_npwp != '' THEN 1 ELSE 0 END + 
                 CASE WHEN tanggal_npwp != '' THEN 1 ELSE 0 END + 
                 CASE WHEN golongan_darah != '' THEN 1 ELSE 0 END AS count_progress
        FROM pegawai where id = '".$pegawaiId."'");
        $pegawai->count_progress = $count[0]->count_progress;
        $pegawai->save();
        
    }
}
