<?php

use Illuminate\Database\Seeder;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pegawai')->truncate();
        DB::table('riwayat_diklat')->truncate();
        DB::table('riwayat_pendidikan')->truncate();

        DB::statement(Storage::get('sql/pegawai.sql'));
        DB::statement(Storage::get('sql/riwayat_pendidikan.sql'));
        DB::statement(Storage::get('sql/riwayat_diklat.sql'));
    }
}
