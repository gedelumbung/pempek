<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('menu')->truncate();

        $params = [
            [
                'title' =>  'Pegawai',
                'url' =>  'dashboard.pegawai',
                'icon' =>  'fa fa-users fa-5x',
                'child' => []
            ],
            [
                'title' =>  'Administrator',
                'url' =>  '#',
                'icon' =>  'fa fa-cogs',
                'child' => [
                    [
                        'title' =>  'Roles',
                        'url' =>  'dashboard.roles',
                        'icon' =>  'fa fa-user'
                    ],
                    [
                        'title' =>  'Users',
                        'url' =>  'dashboard.users',
                        'icon' =>  'fa fa-users'
                    ],
                    [
                        'title' =>  'Permision',
                        'url' =>  'dashboard.permissions',
                        'icon' =>  'fa fa-lock'
                    ],
                ]
            ],
            [
                'title' =>  'Formasi',
                'url' =>  '#',
                'icon' =>  'fa fa-wrench',
                'child' => [
                    [
                        'title' =>  'Pangkat dan Golongan',
                        'url' =>  'dashboard.golongan',
                        'icon' =>  'fa fa-pencil'
                    ],
                    [
                        'title' =>  'Jabatan Struktural',
                        'url' =>  'dashboard.jabatan_struktural',
                        'icon' =>  'fa fa-pencil'
                    ],
                    [
                        'title' =>  'Formasi Unit Kerja',
                        'url' =>  'dashboard.unit_kerja',
                        'icon' =>  'fa fa-pencil'
                    ],
                ]
            ],
            [
                'title' =>  'Validasi Data',
                'url' =>  'dashboard.validasi_data',
                'icon' =>  'fa fa-check-square-o',
                'child' => []
            ],
            [
                'title' =>  'Settings',
                'url' =>  '#',
                'icon' =>  'fa fa-cogs',
                'child' => [
                    [
                        'title' =>  'Pengumuman',
                        'url' =>  'dashboard.pengumuman',
                        'icon' =>  'fa fa-pencil'
                    ],
                    [
                        'title' =>  'Slider',
                        'url' =>  'dashboard.sliders',
                        'icon' =>  'fa fa-pencil'
                    ],
                ]
            ],
            [
                'title' =>  'Laporan DUK',
                'url' =>  'dashboard.laporan_duk',
                'icon' =>  'fa fa-file-text',
                'child' => []
            ],
            [
                'title' =>  'Laporan Nominatif',
                'url' =>  'dashboard.laporan_nominatif',
                'icon' =>  'fa fa-file-text',
                'child' => []
            ],
            [
                'title' =>  'Laporan',
                'url' =>  '#',
                'icon' =>  'fa fa-file-text',
                'child' => [
                    [
                        'title' =>  'Pendidikan',
                        'url' =>  'dashboard.laporan.pendidikan',
                        'icon' =>  'fa fa-pencil'
                    ],
                    [
                        'title' =>  'Jabatan',
                        'url' =>  'dashboard.laporan.jabatan',
                        'icon' =>  'fa fa-pencil'
                    ],
                    [
                        'title' =>  'Golongan',
                        'url' =>  'dashboard.laporan.golongan',
                        'icon' =>  'fa fa-pencil'
                    ],
                    [
                        'title' =>  'Konfiguras',
                        'url' =>  'dashboard.laporan.konfigurasi',
                        'icon' =>  'fa fa-pencil'
                    ],
                ]
            ],
        ];

        foreach ($params as $key=>$param) {
            $parent = Menu::create([
                'title' => $param['title'],
                'parent_id' => 0,
                'permission_id' => 0,
                'url' => $param['url'],
                'icon' => $param['icon'],
                'enable' => 1,
                'order' => $key,
            ]);
            $child = $param['child'];
            foreach ($child as $key => $value) {
                Menu::create([
                    'title' => $value['title'],
                    'parent_id' => $parent->id,
                    'permission_id' => 0,
                    'url' => $value['url'],
                    'icon' => $value['icon'],
                    'enable' => 1,
                    'order' => $key,
                ]);
            }
        }
    }
}
