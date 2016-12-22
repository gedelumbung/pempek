<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusPegawaiToDukViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('duk_view', function (Blueprint $table) {
            $table->string('kedudukan_pns')->nullable();
            $table->string('status_pegawai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duk_view', function (Blueprint $table) {
            $table->dropColumn('kedudukan_pns');
            $table->dropColumn('status_pegawai');
        });
    }
}
