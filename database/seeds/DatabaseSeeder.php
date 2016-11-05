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
        $this->call(UnitKerjaTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
        $this->call(SatuanKerjaTableSeeder::class);
        $this->call(JabatanStrukturalTableSeeder::class);
    }
}
