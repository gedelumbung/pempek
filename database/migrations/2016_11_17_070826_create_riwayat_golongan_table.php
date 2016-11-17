<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatGolonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_golongan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            $table->unsignedInteger('golongan_id');
            $table->string('tmt');
            $table->smallInteger('masa_kerja_tahun')->nullable();
            $table->smallInteger('masa_kerja_bulan')->nullable();
            $table->string('nomor_sk');
            $table->string('tahun_sk');
            $table->string('nomor_persetujuan_bkn');
            $table->string('tahun_persetujuan_bkn');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_golongan', function (Blueprint $table) {
            $table->drop('riwayat_golongan');
        });
    }
}
