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
                'title' =>  'Dashboard',
                'url' =>  'dashboard.home',
                'icon' =>  'fa fa-dashboard fa-5x',
                'permission_id' =>  28,
                'child' => []
            ],
            [
                'title' =>  'Pegawai',
                'url' =>  'dashboard.pegawai',
                'icon' =>  'fa fa-users fa-5x',
                'permission_id' =>  15,
                'child' => []
            ],
            [
                'title' =>  'Administrator',
                'url' =>  '#',
                'icon' =>  'fa fa-cogs',
                'permission_id' =>  27,
                'child' => [
                    [
                        'title' =>  'Roles',
                        'url' =>  'dashboard.roles',
                        'icon' =>  'fa fa-user',
                        'permission_id' =>  27,
                    ],
                    [
                        'title' =>  'Users',
                        'url' =>  'dashboard.users',
                        'icon' =>  'fa fa-users',
                        'permission_id' =>  27,
                    ],
                    [
                        'title' =>  'Permision',
                        'url' =>  'dashboard.permissions',
                        'icon' =>  'fa fa-lock',
                        'permission_id' =>  27,
                    ],
                ]
            ],
            [
                'title' =>  'Master Data',
                'url' =>  '#',
                'icon' =>  'fa fa-wrench',
                'permission_id' =>  0,
                'child' => [
                    [
                        'title' =>  'Pangkat dan Golongan',
                        'url' =>  'dashboard.golongan',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  2,
                    ],
                    [
                        'title' =>  'Jabatan Struktural',
                        'url' =>  'dashboard.jabatan_struktural',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  3,
                    ],
                    [
                        'title' =>  'Formasi Unit Kerja',
                        'url' =>  'dashboard.unit_kerja',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  4,
                    ],
                ]
            ],
            [
                'title' =>  'Validasi Data',
                'url' =>  'dashboard.validasi_data',
                'icon' =>  'fa fa-check-square-o',
                'permission_id' =>  13,
                'child' => []
            ],
            [
                'title' =>  'Frontend Settings',
                'url' =>  '#',
                'icon' =>  'fa fa-cogs',
                'permission_id' =>  29,
                'child' => [
                    [
                        'title' =>  'Pengumuman',
                        'url' =>  'dashboard.pengumuman',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  29,
                    ],
                    [
                        'title' =>  'Slider',
                        'url' =>  'dashboard.sliders',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  29,
                    ],
                    [
                        'title' =>  'Settings',
                        'url' =>  'dashboard.settings',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  29,
                    ],
                ]
            ],
            [
                'title' =>  'Laporan',
                'url' =>  '#',
                'icon' =>  'fa fa-file-text',
                'permission_id' =>  0,
                'child' => [
                    [
                        'title' =>  'Laporan DUK',
                        'url' =>  'dashboard.laporan.duk',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  6,
                    ],
                    [
                        'title' =>  'Laporan Nominatif',
                        'url' =>  'dashboard.laporan.nominatif',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  7,
                    ],
                    [
                        'title' =>  'Laporan Konfirgurasi Pendidikan',
                        'url' =>  'dashboard.laporan.pendidikan',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  8,
                    ],
                    [
                        'title' =>  'Laporan Konfirgurasi Jabatan',
                        'url' =>  'dashboard.laporan.jabatan',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  9,
                    ],
                    [
                        'title' =>  'Laporan Konfirgurasi Golongan',
                        'url' =>  'dashboard.laporan.golongan',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  10,
                    ],
                    [
                        'title' =>  'Laporan Konfirgurasi Usia',
                        'url' =>  'dashboard.laporan.usia',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  11,
                    ],
                    [
                        'title' =>  'Laporan Konfirgurasi Jenis Kelamin',
                        'url' =>  'dashboard.laporan.jenis_kelamin',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  12,
                    ],
                    [
                        'title' =>  'Laporan Alert Pensiun',
                        'url' =>  'dashboard.laporan.jenis_kelamin',
                        'icon' =>  'fa fa-pencil',
                        'permission_id' =>  12,
                    ],
                ]
            ],
        ];

        foreach ($params as $key=>$param) {
            $parent = Menu::create([
                'title' => $param['title'],
                'parent_id' => 0,
                'permission_id' => $param['permission_id'],
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
                    'permission_id' => $value['permission_id'],
                    'url' => $value['url'],
                    'icon' => $value['icon'],
                    'enable' => 1,
                    'order' => $key,
                ]);
            }
        }
    }
}
