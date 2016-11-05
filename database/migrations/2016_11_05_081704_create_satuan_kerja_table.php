<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSatuanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuan_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('unit_kerja_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('satuan_kerja', function (Blueprint $table) {
            $table->dropForeign(['unit_kerja_id']);
            $table->drop('satuan_kerja');
        });
    }
}
