<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Permission;

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
            'name' => 'golongan:golongan',
            'display_name' => 'Golongan',
            'description' => 'Melakukan seluruh perintah di golongan'
          ],
          [
            'name' => 'jabatan:jabatan',
            'display_name' => 'Jabatan',
            'description' => 'Melakukan seluruh perintah di jabatan'
          ],
          [
            'name' => 'laporan:duk',
            'display_name' => 'Duk',
            'description' => 'Melakukan seluruh perintah di duk'
          ],
          [
            'name' => 'laporanpegawai:laporan',
            'display_name' => 'Laporan',
            'description' => 'Melakukan seluruh perintah di laporan'
          ],
          [
            'name' => 'validasi:validasi',
            'display_name' => 'Validasi',
            'description' => 'Melakukan seluruh perintah di validasi'
          ],
          [
            'name' => 'pegawai:list-pegawai',
            'display_name' => 'List Pegawai',
            'description' => 'Melihat List Pegawai'
          ],
          [
            'name' => 'pegawai:edit-pegawai',
            'display_name' => 'Edit Pegawai',
            'description' => 'Dapat mengedit pegawai'
          ],
          [
            'name' => 'pegawai:tambah-pegawai',
            'display_name' => 'Tambah Pegawai',
            'description' => 'Dapat menambahkan pegawai'
          ],
          [
            'name' => 'pegawai:detail-pegawai',
            'display_name' => 'Detail Pegawai',
            'description' => 'Dapat melihat detai pegawai'
          ],
          [
            'name' => 'pegawai:hapus-pegawai',
            'display_name' => 'Hapus Pegawai',
            'description' => 'Menghapus Pegawai'
          ],
          [
            'name' => 'jabatan:fungsional',
            'display_name' => 'Jabatan Fungsional',
            'description' => 'Melakukan seluruh perintah di jabatan fungsional'
          ],
          [
            'name' => 'jabatan:unit',
            'display_name' => 'Unit Kerja',
            'description' => 'Melakukan seluruh perintah di jabatan fungsional'
          ],
          [
            'name' => 'admin:permission',
            'display_name' => 'Permission',
            'description' => 'Mengatur Permssion seluruh user'
          ],
          [
            'name' => 'home:dashboard',
            'display_name' => 'Dashboard',
            'description' => 'View Dashboard'
          ],
          [
            'name' => 'front-end:front-end',
            'display_name' => 'Front End',
            'description' => 'Melakukan seluruh perintah untuk mengubah front-end'
          ],
        ];

        foreach ($params as $param) {
          Permission::create([
              'name' => $param['name'],
              'display_name' => $param['display_name'],
              'description' => $param['description']
          ]);
        }
    }
}