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
