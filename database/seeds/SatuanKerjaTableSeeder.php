<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\SatuanKerja;

class SatuanKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('satuan_kerja')->truncate();

        $titles = [
            'DITJEN',
            'SETDITJEN',
            'Bina Potensi',
            'P3KT',
            'PTT',
            'P2T',
            'P3'
        ];

        foreach ($titles as $title) {
            SatuanKerja::create([
                'title' => $title
            ]);
        }
    }
}
