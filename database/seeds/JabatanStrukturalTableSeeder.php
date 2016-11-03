<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\JabatanStruktural;
use Simpeg\Model\SatuanKerja;

class JabatanStrukturalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('jabatan_struktural')->truncate();

        $satuanKerja = SatuanKerja::all();

        $params = [
            array (
              0 => 
              array (
                'nama_jabatan' => 'Direktur Jendral Penyiapan Kawasan Dan Pembangunan Permukiman Transmigrasi',
                'eselon' => 'I   ',
              ),
              1 => 
              array (
                'nama_jabatan' => 'Sekretaris Direktorat Jenderal',
                'eselon' => 'II  ',
              ),
              2 => 
              array (
                'nama_jabatan' => 'Direktur Bina Botensi Kawasan Transmigrasi',
                'eselon' => 'II  ',
              ),
              3 => 
              array (
                'nama_jabatan' => 'Direktur Perencanaan Pembangunan dan Pengembangan Kawasan',
                'eselon' => 'II  ',
              ),
              4 => 
              array (
                'nama_jabatan' => 'Direktur Penyediaan Tanah Transmigrasi',
                'eselon' => 'II  ',
              ),
              5 => 
              array (
                'nama_jabatan' => 'Direktur Pembangunan Pemukiman Transmigrasi',
                'eselon' => 'II  ',
              ),
              6 => 
              array (
                'nama_jabatan' => 'Direktur Penataan Persebaran Penduduk',
                'eselon' => 'II  ',
              ),
            ),
            array (
              0 => 
              array (
                'nama_jabatan' => 'Kepala Bagian Perencanaan',
                'eselon' => 'III ',
              ),
              1 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Penyusunan Program dan Anggaran',
                'eselon' => 'IV  ',
              ),
              2 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Data dan Informasi',
                'eselon' => 'IV  ',
              ),
              3 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Evaluasi dan Pelaporan',
                'eselon' => 'IV  ',
              ),
              4 => 
              array (
                'nama_jabatan' => 'Kepala Kepala Bagian Keuangan dan Barang Milik Negara',
                'eselon' => 'III ',
              ),
              5 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Pelaksanaan Anggaran',
                'eselon' => 'IV  ',
              ),
              6 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Perbendaharaan',
                'eselon' => 'IV  ',
              ),
              7 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Akuntansi dan Barang Milik Negara',
                'eselon' => 'IV  ',
              ),
              8 => 
              array (
                'nama_jabatan' => 'Kepala Bagian Kepegawaian dan Umum',
                'eselon' => 'III ',
              ),
              9 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Kepegawaian',
                'eselon' => 'IV  ',
              ),
              10 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Persuratan',
                'eselon' => 'IV  ',
              ),
              11 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Perlengkapan dan Rumah Tangga',
                'eselon' => 'IV  ',
              ),
              12 => 
              array (
                'nama_jabatan' => 'Kepala Kepala Bagian Hukum, Organisasi dan Tata Laksana',
                'eselon' => 'III ',
              ),
              13 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Penyusunan Peraturan Perundang-Undangan',
                'eselon' => 'IV  ',
              ),
              14 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Advokasi Hukum',
                'eselon' => 'IV  ',
              ),
              15 => 
              array (
                'kode_jab' => 'j23 ',
                'nama_jabatan' => 'Kepala Sub Bagian Organisasi dan Tata Laksana',
                'kode_satker' => 'sk2 ',
                'eselon' => 'IV  ',
                'level' => 17,
              ),
            ),
            array (
              0 => 
              array (
                'kode_jab' => 'j25 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 1,
              ),
              1 => 
              array (
                'kode_jab' => 'j26 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Identifikasi dan Informasi Potensi Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'III ',
                'level' => 2,
              ),
              2 => 
              array (
                'kode_jab' => 'j27 ',
                'nama_jabatan' => 'Kepala Seksi Identifikasi Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 3,
              ),
              3 => 
              array (
                'kode_jab' => 'j28 ',
                'nama_jabatan' => 'Kepala Seksi Informasi Potensi Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 4,
              ),
              4 => 
              array (
                'kode_jab' => 'j29 ',
                'nama_jabatan' => 'Kepala Kepala Sub Direktorat Advokasi Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'III ',
                'level' => 5,
              ),
              5 => 
              array (
                'kode_jab' => 'j30 ',
                'nama_jabatan' => 'Kepala Seksi Penyiapan Bahan Advokasi',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 6,
              ),
              6 => 
              array (
                'kode_jab' => 'j31 ',
                'nama_jabatan' => 'Kepala Seksi Evaluasi dan Pelaporan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 7,
              ),
              7 => 
              array (
                'kode_jab' => 'j32 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Perencanaan Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'III ',
                'level' => 8,
              ),
              8 => 
              array (
                'kode_jab' => 'j33 ',
                'nama_jabatan' => 'Kepala Seksi Pengumpulan dan Pengolahan Data',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 9,
              ),
              9 => 
              array (
                'kode_jab' => 'j34 ',
                'nama_jabatan' => 'Kepala Seksi Penyusunan Rencana Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 10,
              ),
              10 => 
              array (
                'kode_jab' => 'j35 ',
                'nama_jabatan' => 'Kepala Kepala Sub Direktorat Fasilitasi Penetapan Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'III ',
                'level' => 11,
              ),
              11 => 
              array (
                'kode_jab' => 'j36 ',
                'nama_jabatan' => 'Kepala Seksi Pengumpul dan Pengolahan Data',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 12,
              ),
              12 => 
              array (
                'kode_jab' => 'j37 ',
                'nama_jabatan' => 'Kepala Seksi Penilaian Kawasan',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 13,
              ),
              13 => 
              array (
                'kode_jab' => 'j38 ',
                'nama_jabatan' => 'Kepala Kepala Sub Direktorat Mediasi dan Kerja Sama Antar Daerah',
                'kode_satker' => 'sk3 ',
                'eselon' => 'III ',
                'level' => 14,
              ),
              14 => 
              array (
                'kode_jab' => 'j39 ',
                'nama_jabatan' => 'Kepala Seksi Mediasi Antar Daerah',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 15,
              ),
              15 => 
              array (
                'kode_jab' => 'j40 ',
                'nama_jabatan' => 'Kepala Seksi Kerja Sama Antar Daerah',
                'kode_satker' => 'sk3 ',
                'eselon' => 'IV  ',
                'level' => 16,
              ),
              16 => 
              array (
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'eselon' => 'IV  ',
              ),
            ),
            array (
              0 => 
              array (
                'kode_jab' => 'j43 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              1 => 
              array (
                'kode_jab' => 'j44 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Perencanaan Teknis Suatu Kawasan Pengembangan',
                'kode_satker' => 'sk4 ',
                'eselon' => 'III ',
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              2 => 
              array (
                'kode_jab' => 'j45 ',
                'nama_jabatan' => 'Kepala Seksi Pengumpulan dan Pengolahan Data',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              3 => 
              array (
                'kode_jab' => 'j46 ',
                'nama_jabatan' => 'Kepala Seksi Penyusunan Rencana Suatu Kawasan Pengembangan',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              4 => 
              array (
                'kode_jab' => 'j47 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Perencanaan Teknis Suatu Pemukiman',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              5 => 
              array (
                'kode_jab' => 'j48 ',
                'nama_jabatan' => 'Kepala Seksi Pengumpulan dan Pengolahan Data',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              6 => 
              array (
                'kode_jab' => 'j49 ',
                'nama_jabatan' => 'Kepala Seksi Penyusunan Rencana Satuan Pemukiman',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              7 => 
              array (
                'kode_jab' => 'j50 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Perencanaan Sarana dan Prasarana Kawasan',
                'kode_satker' => 'sk4 ',
                'eselon' => 'III ',
                'level' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              8 => 
              array (
                'kode_jab' => 'j51 ',
                'nama_jabatan' => 'Kepala Seksi Perencanaan Sarana',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              9 => 
              array (
                'kode_jab' => 'j52 ',
                'nama_jabatan' => 'Kepala Seksi Perencanaan Prasarana',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              10 => 
              array (
                'kode_jab' => 'j53 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Perencanaan Pengembangan Masyarakat',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              11 => 
              array (
                'kode_jab' => 'j54 ',
                'nama_jabatan' => 'Kepala Seksi Perencanaan Pengembangan Ekonomi',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              12 => 
              array (
                'kode_jab' => 'j55 ',
                'nama_jabatan' => 'Kepala Seksi Perencanaan Pengembangan Sosial Budaya',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              13 => 
              array (
                'kode_jab' => 'j57 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk4 ',
                'eselon' => 'IV  ',
                'level' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
            ),
            array (
              0 => 
              array (
                'kode_jab' => 'j58 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              1 => 
              array (
                'kode_jab' => 'j59 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Fasilitasi Pencadangan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'III ',
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              2 => 
              array (
                'kode_jab' => 'j60 ',
                'nama_jabatan' => 'Kepala Seksi Identifikasi Status dan Penggunaan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              3 => 
              array (
                'kode_jab' => 'j61 ',
                'nama_jabatan' => 'Kepala Seksi Pengurusan Status Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              4 => 
              array (
                'kode_jab' => 'j62 ',
                'nama_jabatan' => 'Kepala Kepala Sub Direktorat Identifikasi dan Penataan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'III ',
                'level' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              5 => 
              array (
                'kode_jab' => 'j63 ',
                'nama_jabatan' => 'Kepala Seksi Identifikasi Penggunaan dan Pemilikan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              6 => 
              array (
                'kode_jab' => 'j64 ',
                'nama_jabatan' => 'Kepala Seksi Penataan Penggunaan dan Pemilikan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              7 => 
              array (
                'kode_jab' => 'j65 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Pengelolaan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'III ',
                'level' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              8 => 
              array (
                'kode_jab' => 'j66 ',
                'nama_jabatan' => 'Kepala Seksi Pengurusan Hak Pengelolaan Lahan',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              9 => 
              array (
                'kode_jab' => 'j67 ',
                'nama_jabatan' => 'Kepala Seksi Pemeliharaan Hak Pengelolaan Lahan',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              10 => 
              array (
                'kode_jab' => 'j68 ',
                'nama_jabatan' => 'Kepala Kepala Sub Direktorat Dokumentasi Penyediaan Tanah',
                'kode_satker' => 'sk5 ',
                'eselon' => 'III ',
                'level' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              11 => 
              array (
                'kode_jab' => 'j69 ',
                'nama_jabatan' => 'Kepala Seksi Pengolahan Data',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              12 => 
              array (
                'kode_jab' => 'j70 ',
                'nama_jabatan' => 'KepalaSeksi Penyajian Informasi dan Pelaporan',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              13 => 
              array (
                'kode_jab' => 'j72 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk5 ',
                'eselon' => 'IV  ',
                'level' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
            ),
            array (
              0 => 
              array (
                'kode_jab' => 'j73 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              1 => 
              array (
                'kode_jab' => 'j74 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Penyiapan dan Evaluasi Lahan Permukiman',
                'kode_satker' => 'sk6 ',
                'eselon' => 'III ',
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              2 => 
              array (
                'kode_jab' => 'j75 ',
                'nama_jabatan' => 'Kepala Seksi Penyiapan Lahan',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              3 => 
              array (
                'kode_jab' => 'j76 ',
                'nama_jabatan' => 'Kepala Seksi Evaluasi Penyiapan Lahan',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              4 => 
              array (
                'kode_jab' => 'j77 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Penyiapan dan Evaluasi Sarana Permukiman',
                'kode_satker' => 'sk6 ',
                'eselon' => 'III ',
                'level' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              5 => 
              array (
                'kode_jab' => 'j78 ',
                'nama_jabatan' => 'Kepala Seksi Penyiapan Sarana',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              6 => 
              array (
                'kode_jab' => 'j79 ',
                'nama_jabatan' => 'Kepala Seksi Evaluasi Penyiapan Sarana',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              7 => 
              array (
                'kode_jab' => 'j80 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Penyiapan dan Evaluasi Prasarana Permukiman',
                'kode_satker' => 'sk6 ',
                'eselon' => 'III ',
                'level' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              8 => 
              array (
                'kode_jab' => 'j81 ',
                'nama_jabatan' => 'Kepala Seksi Penyiapan Prasarana',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              9 => 
              array (
                'kode_jab' => 'j82 ',
                'nama_jabatan' => 'Kepala Seksi Evaluasi Penyiapan Prasarana',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              10 => 
              array (
                'kode_jab' => 'j83 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Kelayakan Permukiman',
                'kode_satker' => 'sk6 ',
                'eselon' => 'III ',
                'level' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              11 => 
              array (
                'kode_jab' => 'j84 ',
                'nama_jabatan' => 'Kepala Seksi Evaluasi Kelayakan',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              12 => 
              array (
                'kode_jab' => 'j85 ',
                'nama_jabatan' => 'Kepala Seksi Perwujudan Ruang',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              13 => 
              array (
                'kode_jab' => 'j87 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk6 ',
                'eselon' => 'IV  ',
                'level' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
            ),
            array (
              0 => 
              array (
                'kode_jab' => 'j88 ',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              1 => 
              array (
                'kode_jab' => 'j89 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Penyiapan Perpindahan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'III ',
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              2 => 
              array (
                'kode_jab' => 'j90 ',
                'nama_jabatan' => 'Kepala Seksi Penyerasian Perpindahan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              3 => 
              array (
                'kode_jab' => 'j91 ',
                'nama_jabatan' => 'Kepala Seksi Administrasi Perpindahan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              4 => 
              array (
                'kode_jab' => 'j92 ',
                'nama_jabatan' => 'Kepala Kepala Sub Direktorat Penyiapan Calon Transmigran dan Penduduk Setempat',
                'kode_satker' => 'sk7 ',
                'eselon' => 'III ',
                'level' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              5 => 
              array (
                'kode_jab' => 'j93 ',
                'nama_jabatan' => 'Kepala Seksi Pendaftaran dan Seleksi',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              6 => 
              array (
                'kode_jab' => 'j94 ',
                'nama_jabatan' => 'Kepala Seksi Keterampilan Calon Transmigran dan Penduduk Setempat',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              7 => 
              array (
                'kode_jab' => 'j95 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Pelayanan Perpindahan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'III ',
                'level' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              8 => 
              array (
                'kode_jab' => 'j96 ',
                'nama_jabatan' => 'Kepala Seksi Penampungan dan Perbekalan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              9 => 
              array (
                'kode_jab' => 'j97 ',
                'nama_jabatan' => 'Kepala Seksi Pengangkutan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              10 => 
              array (
                'kode_jab' => 'j98 ',
                'nama_jabatan' => 'Kepala Sub Direktorat Penataan dan Adaptasi',
                'kode_satker' => 'sk7 ',
                'eselon' => 'III ',
                'level' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              11 => 
              array (
                'kode_jab' => 'j99 ',
                'nama_jabatan' => 'Kepala Seksi Penataan',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              12 => 
              array (
                'kode_jab' => 'j100',
                'nama_jabatan' => 'Kepala Seksi Adaptasi',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
              13 => 
              array (
                'kode_jab' => 'j102',
                'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'kode_satker' => 'sk7 ',
                'eselon' => 'IV  ',
                'level' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
                'active' => 1,
              ),
            )
        ];

        foreach ($satuanKerja as $key => $satuan) {
            $entities = $params[$key];
            foreach ($entities as $key => $entity) {
                JabatanStruktural::create([
                    'satuan_kerja_id' => $satuan->id,
                    'parent_id' => 0,
                    'title' => $entity['nama_jabatan'],
                    'eselon' => $entity['eselon'],
                    'status' => 1
                ]);
            }
        }
    }
}
