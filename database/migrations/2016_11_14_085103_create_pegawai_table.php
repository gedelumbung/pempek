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
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('handphone')->nullable();
            $table->string('kedudukan_pns', 50);
            $table->string('status_pegawai', 25);
            $table->string('tmt_cpns', 50)->nullable();
            $table->string('tmt_pns', 50)->nullable();
            $table->string('pendidikan_awal_cpns', 80);
            $table->string('pendidikan_akhir', 80);
            $table->string('tahun_diklat_sepada')->nullable();
            $table->string('tahun_diklat_sepala')->nullable();
            $table->string('tahun_diklat_sepadya')->nullable();
            $table->string('tahun_diklat_spamen')->nullable();
            $table->string('tahun_diklat_sepati')->nullable();
            $table->string('pendidikan_akhir_fakultas')->nullable();
            $table->string('pendidikan_akhir_jurusan')->nullable();
            $table->string('pendidikan_akhir_tahun_lulus')->nullable();
            $table->text('foto')->nullable();

            //posisi & jabatan
            $table->string('unit_organisasi')->nullable();
            $table->string('jenis_jabatan', 50)->nullable();
            $table->string('unit_kerja_id')->nullable();
            $table->string('sub_unit_kerja_id')->nullable();
            $table->string('satuan_kerja_id')->nullable();
            $table->string('jabatan_struktural_id')->nullable();
            $table->string('eselon')->nullable();
            $table->string('tmt_eselon')->nullable();

            $table->string('jabatan_fungsional_tertentu')->nullable();
            $table->string('tmt_jabatan_fungsional_tertentu')->nullable();

            $table->string('jabatan_fungsional_umum')->nullable();
            $table->string('tmt_jabatan_fungsional_umum')->nullable();

            $table->unsignedInteger('golongan_id_awal')->nullable();
            $table->string('tmt_golongan_awal')->nullable();
            $table->unsignedInteger('golongan_id_akhir')->nullable();
            $table->string('tmt_golongan_akhir')->nullable();

            $table->string('gaji_pokok')->nullable();
            $table->string('masa_kerja_tahun')->nullable();
            $table->string('masa_kerja_bulan')->nullable();
            $table->string('penyesuaian_masa_kerja_tahun')->nullable();
            $table->string('penyesuaian_masa_kerja_bulan')->nullable();
            $table->string('sk_penyesuaian_masa_kerja')->nullable();

            //data lain
            $table->string('no_seri_karpeg')->nullable();
            $table->string('no_seri_kpe')->nullable();
            $table->string('no_seri_karis')->nullable();
            $table->string('no_akte_kelahiran')->nullable();
            $table->string('tahun_no_akte_kelahiran')->nullable();
            $table->string('no_askes')->nullable();
            $table->string('no_taspen')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('tanggal_npwp')->nullable();
            $table->string('golongan_darah', 2)->nullable();
            
            $table->integer('count_progress')->default(0);

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
