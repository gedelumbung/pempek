<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatanStrukturalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan_struktural', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('satuan_kerja_id');
            $table->string('title');
            $table->string('eselon', 5);
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('satuan_kerja_id')->references('id')->on('satuan_kerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jabatan_struktural', function (Blueprint $table) {
            $table->dropForeign(['satuan_kerja_id']);
            $table->drop('jabatan_struktural');
        });
    }
}
