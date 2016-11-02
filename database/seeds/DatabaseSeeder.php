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
        $this->call(AgamaTableSeeder::class);
        $this->call(SatuanKerjaTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
    }
}
