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
        DB::table('permission_role')->truncate();

        $params = [
          [
            'slug' => 'master',
            'name' => 'Master Data',
            'description' => 'Mengatur master data',
            'sub' => [
              [
                'slug' => 'golongan',
                'name' => 'Golongan',
                'description' => 'Melakukan seluruh perintah di golongan',
                'sub' => []
              ],
              [
                'slug' => 'jabatan',
                'name' => 'Jabatan',
                'description' => 'Melakukan seluruh perintah di jabatan',
                'sub' => []
              ],
              [
                'slug' => 'unitkerja-master',
                'name' => 'Formasi Unit Kerja',
                'description' => 'Mengatur data master unit kerja'
              ],
            ]
          ],
          [
            'slug' => 'laporan',
            'name' => 'Laporan',
            'description' => 'Melakukan seluruh perintah di laporan',
            'sub' => [
              [
                'slug_parent' => 'laporan',
                'slug' => 'duk',
                'name' => 'Duk',
                'description' => 'Melakukan seluruh perintah di duk'
              ],
              [
                'slug_parent' => 'laporan',
                'slug' => 'nominatif',
                'name' => 'Nominatif',
                'description' => 'Melakukan seluruh perintah di Nominatif'
              ],
              [
                'slug_parent' => 'laporan',
                'slug' => 'konfigurasi-pendidikan',
                'name' => 'Konfigurasi Pendidikan',
                'description' => 'Melakukan seluruh perintah di Konfigurasi Pendidikan'
              ],
              [
                'slug_parent' => 'laporan',
                'slug' => 'konfigurasi-jabatan',
                'name' => 'Konfigurasi Jabatan',
                'description' => 'Melakukan seluruh perintah di konfigurasi jabatan'
              ],
              [
                'slug_parent' => 'laporan',
                'slug' => 'konfigurasi-golongan',
                'name' => 'Konfigurasi Golongan',
                'description' => 'Melakukan seluruh perintah di Konfigurasi Golongan'
              ],
              [
                'slug_parent' => 'laporan',
                'slug' => 'konfigurasi-usia',
                'name' => 'Konfigurasi Usia',
                'description' => 'Melakukan seluruh perintah di Konfigurasi Usia'
              ],
              [
                'slug_parent' => 'laporan',
                'slug' => 'konfigurasi-jenis-kelamin',
                'name' => 'Konfigurasi Jenis Kelamin',
                'description' => 'Melakukan seluruh perintah di Konfigurasi Jenis Kelamin'
              ],
            ]
          ],
          [
            'slug' => 'validasi',
            'name' => 'Validasi',
            'description' => 'Melakukan seluruh perintah di validasi',
            'sub' => []
          ],
          [
            'slug' => 'pegawai',
            'name' => 'Pegawai',
            'description' => 'Melakukan seluruh perintah di Pegawai',
            'sub' => [
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
            ]
          ],
          [
            'slug' => 'unitkerja',
            'name' => 'Unit Kerja',
            'description' => 'Mengatur unit kerja',
            'sub' => [
              [
                'slug' => 'unitkerja-ditjen-setditjen',
                'name' => 'Unit Kerja Ditjen dan Setditjen',
                'description' => 'Melakukan manajemen data untuk unit kerja DITJEN dan Setditjen'
              ],
              [
                'slug' => 'unitkerja-bina-potensi',
                'name' => 'Unit Kerja Bina Potensi',
                'description' => 'Melakukan manajemen data untuk unit kerja Bina Potensi'
              ],
              [
                'slug' => 'unitkerja-p3kt',
                'name' => 'Unit Kerja P3KT',
                'description' => 'Melakukan manajemen data untuk unit kerja P3KT'
              ],
              [
                'slug' => 'unitkerja-ptt',
                'name' => 'Unit Kerja PTT',
                'description' => 'Melakukan manajemen data untuk unit kerja PTT'
              ],
              [
                'slug' => 'unitkerja-p2t',
                'name' => 'Unit Kerja P2T',
                'description' => 'Melakukan manajemen data untuk unit kerja P2T'
              ],
              [
                'slug' => 'unitkerja-p3',
                'name' => 'Unit Kerja P3',
                'description' => 'Melakukan manajemen data untuk unit kerja P3'
              ],
            ]
          ],
          [
            'slug' => 'permission',
            'name' => 'Permission',
            'description' => 'Mengatur Permssion seluruh user',
            'sub' => []
          ],
          [
            'slug' => 'dashboard',
            'name' => 'Dashboard',
            'description' => 'View Dashboard',
            'sub' => []
          ],
          [
            'slug' => 'frontend',
            'name' => 'Front End',
            'description' => 'Melakukan seluruh perintah untuk mengubah front-end',
            'sub' => []
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

          $sub = $param['sub'];
          if (count($sub) > 0) {
            foreach ($sub as $value) {
              $sub_permission = Permission::create([
                  'slug' => $value['slug'],
                  'name' => $value['name'],
                  'description' => $value['description'],
                  'parent_id' => $permission->id,
              ]);

              PermissionRole::create([
                'permission_id' => $sub_permission->id,
                'role_id' => 3
              ]);
            }
          }
        }

    }
}