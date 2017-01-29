<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDukViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duk_view', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            //pangkat order
            $table->string('golongan');

            //jabatan order
            $table->string('level')->nullable();
            $table->string('eselon')->nullable();
            $table->string('jenis_jabatan_level')->nullable();
            $table->string('tmt_jabatan_eselon')->nullable();

            //masa kerja order
            $table->string('masa_kerja');

            //latihan jabatan order
            $table->string('sepada')->nullable();
            $table->string('sepala')->nullable();
            $table->string('sepadya')->nullable();
            $table->string('spamen')->nullable();
            $table->string('sepati')->nullable();

            //pendidikan order
            $table->string('level_pendidikan');
            $table->string('tahun_pendidikan');

            //usia order
            $table->integer('usia');

            $table->string('unit_kerja_id')->nullable();
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
        Schema::drop('duk_view');
    }
}
