<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatKursusLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_kursus_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            $table->string('nama_kursus');
            $table->integer('jumlah_jam');
            $table->string('nomor_sertifikat');
            $table->string('tanggal');
            $table->string('penyelenggara');
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
        Schema::table('riwayat_kursus_log', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);
            $table->drop('riwayat_kursus_log');
        });
    }
}
