<?php

use Illuminate\Database\Seeder;
use Simpeg\Model\Pengumuman;

class PengumumanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('pengumuman')->truncate();
      DB::statement(Storage::get('sql/pengumuman.sql'));
    }
}
