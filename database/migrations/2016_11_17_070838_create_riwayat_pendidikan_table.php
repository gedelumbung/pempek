<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            $table->string('nama_sekolah');
            $table->string('tingkat_pendidikan',20);
            $table->string('fakultas');
            $table->string('ijazah_pendidikan');
            $table->string('tanggal_lulus');
            $table->string('nama_pimpinan');
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
        Schema::table('riwayat_pendidikan', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);
            $table->drop('riwayat_pendidikan');
        });
    }
}
