<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            $table->string('nama');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('telepon');
            $table->string('status_hidup');
            $table->text('alamat');
            $table->string('status_perkawinan');
            $table->string('akte_perceraian');
            $table->string('tanggal_akte_perceraian');
            $table->string('akte_kelahiran');
            $table->string('tanggal_akte_kelahiran');
            $table->string('akte_meninggal');
            $table->string('tanggal_akte_meninggal');
            $table->string('npwp');
            $table->string('tanggal_npwp');
            $table->string('nama_pasangan')->nullable();
            $table->string('nip_pasangan')->nullable();
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasangan', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);
            $table->drop('pasangan');
        });
    }
}
