<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\UnitKerja;

class UnitKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('unit_kerja')->truncate();

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
            UnitKerja::create([
                'title' => $title
            ]);
        }
    }
}
