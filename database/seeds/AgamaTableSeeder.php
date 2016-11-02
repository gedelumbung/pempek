<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Agama;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Islam',
            'Kristen Katolik',
            'Kristen Protestan',
            'Konghucu',
            'Hindu',
            'Budha',
        ];

        foreach ($types as $type) {
            Agama::create([
                'title' => $type
            ]);
        }
    }
}
