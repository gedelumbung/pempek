<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            $table->unsignedInteger('unit_kerja_id');
            $table->unsignedInteger('jabatan_struktural_id');
            $table->string('instansi');
            $table->string('nomor_sk');
            $table->string('tanggal');
            $table->string('tmt');
            $table->string('eselon');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerja')->onDelete('cascade');
            $table->foreign('jabatan_struktural_id')->references('id')->on('jabatan_struktural')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_jabatan', function (Blueprint $table) {
            $table->drop('riwayat_jabatan');
        });
    }
}
