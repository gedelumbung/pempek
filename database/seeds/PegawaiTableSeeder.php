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
        DB::table('pegawai_log')->truncate();
        DB::table('pasangan')->truncate();
        DB::table('riwayat_pendidikan')->truncate();
        DB::table('riwayat_pendidikan_log')->truncate();
        DB::table('riwayat_diklat')->truncate();
        DB::table('riwayat_diklat_log')->truncate();

        DB::statement(Storage::get('sql/pegawai.sql'));
        DB::statement(Storage::get('sql/pegawai_log.sql'));
        DB::statement(Storage::get('sql/pasangan.sql'));
        DB::statement(Storage::get('sql/riwayat_pendidikan.sql'));
        DB::statement(Storage::get('sql/riwayat_pendidikan_log.sql'));
        DB::statement(Storage::get('sql/riwayat_diklat.sql'));
        DB::statement(Storage::get('sql/riwayat_diklat_log.sql'));
    }
}
