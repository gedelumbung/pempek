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
            $table->integer('masa_kerja_tahun',3);
            $table->integer('masa_kerja_bulan',2);
            $table->string('nomor_sk');
            $table->string('tahun_sk');
            $table->string('nomor_persetujuan_bkn');
            $table->string('tahun_persetujuan_bkn');
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
        Schema::drop('riwayat_golongan');
    }
}
