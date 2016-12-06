<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Permission;
use Simpeg\Model\PermissionRole;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();

        $params = [
          [
            'slug' => 'golongan',
            'name' => 'Golongan',
            'description' => 'Melakukan seluruh perintah di golongan'
          ],
          [
            'slug' => 'jabatan',
            'name' => 'Jabatan',
            'description' => 'Melakukan seluruh perintah di jabatan'
          ],
          [
            'slug' => 'duk',
            'name' => 'Duk',
            'description' => 'Melakukan seluruh perintah di duk'
          ],
          [
            'slug' => 'laporan',
            'name' => 'Laporan',
            'description' => 'Melakukan seluruh perintah di laporan'
          ],
          [
            'slug' => 'validasi',
            'name' => 'Validasi',
            'description' => 'Melakukan seluruh perintah di validasi'
          ],
          [
            'slug' => 'pegawai-all',
            'name' => 'List Pegawai',
            'description' => 'Melihat List Pegawai'
          ],
          [
            'slug' => 'pegawai-edit',
            'name' => 'Edit Pegawai',
            'description' => 'Dapat mengedit pegawai'
          ],
          [
            'slug' => 'pegawai-add',
            'name' => 'Tambah Pegawai',
            'description' => 'Dapat menambahkan pegawai'
          ],
          [
            'slug' => 'pegawai-show',
            'name' => 'Detail Pegawai',
            'description' => 'Dapat melihat detai pegawai'
          ],
          [
            'slug' => 'pegawai-delete',
            'name' => 'Hapus Pegawai',
            'description' => 'Menghapus Pegawai'
          ],
          [
            'slug' => 'unitkerja',
            'name' => 'Unit Kerja',
            'description' => 'Melakukan seluruh perintah di jabatan fungsional'
          ],
          [
            'slug' => 'permission',
            'name' => 'Permission',
            'description' => 'Mengatur Permssion seluruh user'
          ],
          [
            'slug' => 'dashboard',
            'name' => 'Dashboard',
            'description' => 'View Dashboard'
          ],
          [
            'slug' => 'frontend',
            'name' => 'Front End',
            'description' => 'Melakukan seluruh perintah untuk mengubah front-end'
          ],
        ];

        foreach ($params as $param) {
          $permission = Permission::create([
              'slug' => $param['slug'],
              'name' => $param['name'],
              'description' => $param['description']
          ]);

          PermissionRole::create([
            'permission_id' => $permission->id,
            'role_id' => 3
          ]);
        }

    }
}