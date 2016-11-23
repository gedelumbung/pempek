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

        $arr = [
              "1" => [
                [
                  "jabatan" => "Direktur Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi ", 
                  "eselon" => "I",
                ],
              ],
              "9" => [
                [
                  "jabatan" => "Sekretaris Direktorat Jenderal ", 
                  "eselon" => "II",
                ],
                [
                  "jabatan" => "Kepala Bagian Perencanaan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Penyusunan Program dan Anggaran ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Data dan Informasi ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Evaluasi dan Pelaporan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Bagian Keuangan dan Barang Milik Negara ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Pelaksanaan Anggaran ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Pembendaharaan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Akuntansi dan Barang Milik Negara ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Bagian Kepegawaian dan Umum ",
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Kepegawaian ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Persuratan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Perlengkapan dan Rumah Tangga ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Bagian Hukum, Organisasi, dan Tata Laksana ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Penyusunan Peraturan Perundang Undangan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Advokasi Hukum ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Organisasi dan Tata Laksana ", 
                  "eselon" => "IV",
                ],
              ],
              "14" => [
                [
                  "jabatan" => "Direktur Bina Potensi Kawasan Transmigrasi ", 
                  "eselon" => "II",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Identifikasi dan Informasi Potensi Kawasan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Identifikasi Kawasan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Informasi Potensi Kawasan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Advokasi Kawasan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Bahan Advokasi ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi dan Pelaporan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Kawasan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyusunan Rencana Kawasan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Fasilitasi Penetapan Kawasan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Penilaian Kawasan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Mediasi dan Kerja Sama Antar Daerah ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Mediasi Antar Daerah ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Kerja Sama Antar Daerah ", 
                  "eselon" => "IV",
                ],
              ],
              "21" => [
                [
                  "jabatan" => "Direktur Perencanaan Pembangunan dan Pengembangan Kawasan Transmigrasi ", 
                  "eselon" => "II",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Teknis Satuan Kawasan Pengembangan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyusunan Rencana Satuan Kawasan Pengembangan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Teknis Satuan Permukiman ",
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyusunan Rencana Satuan Permukiman ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Sarana dan Prasarana Kawasan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Sarana ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Prasarana ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Pengembangan Masyarakat ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Pengembangan Ekonomi ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Pengembangan Sosial Budaya ", 
                  "eselon" => "IV",
                ],
              ],
              "27" => [
                [
                  "jabatan" => "Direktur Penyediaan Tanah Transmigrasi ", 
                  "eselon" => "II",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Fasilitasi Pencadangan Tanah ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Identifikasi Status dan Penggunaan Tanah ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengurusan Status Tanah ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Identifikasi dan Penataan Tanah ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Identifikasi Penggunaan dan Pemilikan Tanah ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Penataan Penggunaan dan Pemilikan Tanah ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Pengelolaan Tanah ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengurusan Hak Pengelolaan Lahan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Pemeliharaan Hak Pengelolaan Lahan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Dokumentasi Penyediaan Tanah ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengolahan Data ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyajian Informasi dan Pelaporan ", 
                  "eselon" => "IV",
                ],
              ],
              "33" => [
                [
                  "jabatan" => "Direktur Pembangunan Pemukiman Transmigrasi ", 
                  "eselon" => "II",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan dan Evaluasi Lahan Permukiman ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Lahan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Penyiapan Lahan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan dan Evaluasi Sarana Permukiman ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Sarana ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Penyiapan Sarana ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan dan Evaluasi Prasarana Permukiman ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Prasarana ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Penyiapan Prasarana ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Kelayakan Permukiman ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Kelayakan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Perwujudan Ruang ", 
                  "eselon" => "IV",
                ],
              ],
              "39" => [
                [
                  "jabatan" => "Direktur Penataan Persebaran Penduduk ", 
                  "eselon" => "II",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan Perpindahan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyerasian Perpindahan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Administrasi Perpindahan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan Calon Transmigran dan Penduduk Setempat ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Pendaftaran dan Seleksi",
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Keterampilan Calon Transmigran dan Penduduk Setempat ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Pelayanan Perpindahan ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penampungan dan Perbekalan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengangkutan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penataan dan Adaptasi ", 
                  "eselon" => "III",
                ],
                [
                  "jabatan" => "Kepala Seksi Penataan ", 
                  "eselon" => "IV",
                ],
                [
                  "jabatan" => "Kepala Seksi Adaptasi ", 
                  "eselon" => "IV"
                ]
              ],
            ];

        foreach ($arr as $key => $jabatan) {
          foreach ($jabatan as $sub) {
            JabatanStruktural::create([
                'unit_kerja_id' => $key,
                'title' => $sub['jabatan'],
                'eselon' => $sub['eselon'],
                'status' => 1
            ]);
          }
        }
    }
}
