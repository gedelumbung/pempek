<?php

use Illuminate\Database\Seeder;

class LatestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('anak')->truncate();
        DB::table('ayah')->truncate();
        DB::table('duk_view')->truncate();
        DB::table('golongan')->truncate();
        DB::table('ibu')->truncate();
        DB::table('jabatan_struktural')->truncate();
        DB::table('menu')->truncate();
        DB::table('pasangan')->truncate();
        DB::table('pegawai_log')->truncate();
        DB::table('pegawai')->truncate();
        DB::table('pengumuman')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('permissions')->truncate();
        DB::table('riwayat_diklat_log')->truncate();
        DB::table('riwayat_diklat')->truncate();
        DB::table('riwayat_golongan')->truncate();
        DB::table('riwayat_jabatan')->truncate();
        DB::table('riwayat_kursus_log')->truncate();
        DB::table('riwayat_kursus')->truncate();
        DB::table('riwayat_pendidikan_log')->truncate();
        DB::table('riwayat_pendidikan')->truncate();
        DB::table('riwayat_penghargaan_log')->truncate();
        DB::table('riwayat_penghargaan')->truncate();
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();
        DB::table('satuan_kerja')->truncate();
        DB::table('settings')->truncate();
        DB::table('sliders')->truncate();
        DB::table('unit_kerja')->truncate();
        DB::table('users')->truncate();

        DB::statement(Storage::get('sql/anak.sql'));
        DB::statement(Storage::get('sql/ayah.sql'));
        DB::statement(Storage::get('sql/duk_view.sql'));
        DB::statement(Storage::get('sql/golongan.sql'));
        DB::statement(Storage::get('sql/ibu.sql'));
        DB::statement(Storage::get('sql/jabatan_struktural.sql'));
        DB::statement(Storage::get('sql/menu.sql'));
        DB::statement(Storage::get('sql/pasangan.sql'));
        DB::statement(Storage::get('sql/pegawai_log.sql'));
        DB::statement(Storage::get('sql/pegawai.sql'));
        DB::statement(Storage::get('sql/pengumuman.sql'));
        DB::statement(Storage::get('sql/permission_role.sql'));
        DB::statement(Storage::get('sql/permissions.sql'));
        DB::statement(Storage::get('sql/riwayat_diklat_log.sql'));
        DB::statement(Storage::get('sql/riwayat_diklat.sql'));
        DB::statement(Storage::get('sql/riwayat_golongan.sql'));
        DB::statement(Storage::get('sql/riwayat_jabatan.sql'));
        DB::statement(Storage::get('sql/riwayat_kursus_log.sql'));
        DB::statement(Storage::get('sql/riwayat_kursus.sql'));
        DB::statement(Storage::get('sql/riwayat_pendidikan_log.sql'));
        DB::statement(Storage::get('sql/riwayat_pendidikan.sql'));
        DB::statement(Storage::get('sql/riwayat_penghargaan_log.sql'));
        DB::statement(Storage::get('sql/riwayat_penghargaan.sql'));
        DB::statement(Storage::get('sql/role_user.sql'));
        DB::statement(Storage::get('sql/roles.sql'));
        DB::statement(Storage::get('sql/satuan_kerja.sql'));
        DB::statement(Storage::get('sql/settings.sql'));
        DB::statement(Storage::get('sql/sliders.sql'));
        DB::statement(Storage::get('sql/unit_kerja.sql'));
        DB::statement(Storage::get('sql/users.sql'));
    }
}
