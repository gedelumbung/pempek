<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip');
            $table->string('nama_lengkap');
            $table->string('gelar_depan');
            $table->string('gelar_belakang');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama', 20);
            $table->string('jenis_kelamin', 10);
            $table->string('status_pernikahan', 15);
            $table->string('email')->index();
            $table->text('alamat');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('handphone');
            $table->string('kedudukan_pns', 50);
            $table->string('status_pegawai', 25);
            $table->string('tmt_cpns', 50);
            $table->string('tmt_pns', 50);
            $table->string('pendidikan_awal_cpns', 80);
            $table->string('pendidikan_akhir', 80);
            $table->string('tahun_diklat_sepada')->nullable();
            $table->string('tahun_diklat_sepala')->nullable();
            $table->string('tahun_diklat_sepadya')->nullable();
            $table->string('tahun_diklat_spamen')->nullable();
            $table->string('tahun_diklat_sepati')->nullable();
            $table->string('pendidikan_akhir_fakultas');
            $table->string('pendidikan_akhir_jurusan');
            $table->string('pendidikan_akhir_tahun_lulus');
            $table->text('foto');

            //posisi & jabatan
            $table->string('unit_organisasi');
            $table->string('jenis_jabatan', 50);
            $table->unsignedInteger('unit_kerja_id');
            $table->unsignedInteger('sub_unit_kerja_id');
            $table->unsignedInteger('satuan_kerja_id');
            $table->unsignedInteger('jabatan_struktural_id')->default(0);
            $table->string('eselon');
            $table->string('tmt_eselon')->nullable();

            $table->string('jabatan_fungsional_tertentu')->nullable();
            $table->string('tmt_jabatan_fungsional_tertentu')->nullable();

            $table->string('jabatan_fungsional_umum')->nullable();
            $table->string('tmt_jabatan_fungsional_umum')->nullable();

            $table->unsignedInteger('golongan_id_awal');
            $table->string('tmt_golongan_awal');
            $table->unsignedInteger('golongan_id_akhir');
            $table->string('tmt_golongan_akhir');

            $table->string('gaji_pokok');
            $table->string('masa_kerja_tahun');
            $table->string('masa_kerja_bulan');
            $table->string('penyesuaian_masa_kerja_tahun');
            $table->string('penyesuaian_masa_kerja_bulan');
            $table->string('sk_penyesuaian_masa_kerja');

            //data lain
            $table->string('no_seri_karpeg');
            $table->string('no_seri_kpe');
            $table->string('no_seri_karis');
            $table->string('no_akte_kelahiran');
            $table->string('tahun_no_akte_kelahiran');
            $table->string('no_askes');
            $table->string('no_taspen');
            $table->string('no_npwp');
            $table->string('tanggal_npwp');
            $table->string('golongan_darah', 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pegawai');
    }
}
