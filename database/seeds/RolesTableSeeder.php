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
            'name' => 'manager',
            'display_name' => 'Manager Personalia',
            'description' => 'Melihat Data Pegawai dan Reporting'
          ],
          [
            'name' => 'pegawai',
            'display_name' => 'Pegawai',
            'description' => 'Melihat Data Pribadi'
          ],
          [
            'name' => 'super-admin',
            'display_name' => 'Super Admin',
            'description' => 'Mengatur semua yang berhubungan dengan sistem'
          ],
          [
            'name' => 'staff',
            'display_name' => 'Staff Personalia',
            'description' => 'Menambahkan data pegawai dan membuat akun'
          ],
        ];

        foreach ($params as $param) {
          Role::create([
              'name' => $param['name'],
              'display_name' => $param['display_name'],
              'description' => $param['description']
          ]);
        }
    }
}
