<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PegawaiTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(UnitKerjaTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
        $this->call(SatuanKerjaTableSeeder::class);
        $this->call(JabatanStrukturalTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PengumumanTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(SettingTableSeeder::class);

        \Artisan::call('simpeg:pegawai:count_progress');
    }
}
