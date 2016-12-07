<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();

        $params = [
          [
            'slug' => 'manager',
            'name' => 'Manager Personalia',
            'description' => 'Melihat Data Pegawai dan Reporting'
          ],
          [
            'slug' => 'pegawai',
            'name' => 'Pegawai',
            'description' => 'Melihat Data Pribadi'
          ],
          [
            'slug' => 'super-admin',
            'name' => 'Super Admin',
            'description' => 'Mengatur semua yang berhubungan dengan sistem'
          ],
          [
            'slug' => 'staff',
            'name' => 'Staff Personalia',
            'description' => 'Menambahkan data pegawai dan membuat akun'
          ],
          [
            'slug' => 'staff-tu-ditjen-setditjen',
            'name' => 'Staff TU Ditjen dan Setdijten',
            'description' => 'Melakukan aktivitas sesuai unit kerja'
          ],
          [
            'slug' => 'staff-tu-bina-potensi',
            'name' => 'Staff TU Bina Potensi',
            'description' => 'Melakukan aktivitas sesuai unit kerja'
          ],
          [
            'slug' => 'staff-tu-p3kt',
            'name' => 'Staff TU P3KT',
            'description' => 'Melakukan aktivitas sesuai unit kerja'
          ],
          [
            'slug' => 'staff-tu-ptt',
            'name' => 'Staff TU PTT',
            'description' => 'Melakukan aktivitas sesuai unit kerja'
          ],
          [
            'slug' => 'staff-tu-p2t',
            'name' => 'Staff TU P2T',
            'description' => 'Melakukan aktivitas sesuai unit kerja'
          ],
          [
            'slug' => 'staff-tu-p3',
            'name' => 'Staff TU P3',
            'description' => 'Melakukan aktivitas sesuai unit kerja'
          ],
        ];

        foreach ($params as $param) {
          Role::create([
              'slug' => $param['slug'],
              'name' => $param['name'],
              'description' => $param['description']
          ]);
        }
    }
}
