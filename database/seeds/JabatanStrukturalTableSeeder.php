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
                  "level" => "35",
                ],
              ],
              "9" => [
                [
                  "jabatan" => "Sekretaris Direktorat Jenderal ", 
                  "eselon" => "II",
                  "level" => "30",
                ],
                [
                  "jabatan" => "Kepala Bagian Perencanaan ", 
                  "eselon" => "III",
                  "level" => "29",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Penyusunan Program dan Anggaran ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Data dan Informasi ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Evaluasi dan Pelaporan ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Bagian Keuangan dan Barang Milik Negara ", 
                  "eselon" => "III",
                  "level" => "29",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Pelaksanaan Anggaran ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Pembendaharaan ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Akuntansi dan Barang Milik Negara ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Bagian Kepegawaian dan Umum ",
                  "eselon" => "III",
                  "level" => "29",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Kepegawaian ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Persuratan ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Perlengkapan dan Rumah Tangga ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Bagian Hukum, Organisasi, dan Tata Laksana ", 
                  "eselon" => "III",
                  "level" => "29",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Penyusunan Peraturan Perundang Undangan ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Advokasi Hukum ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Organisasi dan Tata Laksana ", 
                  "eselon" => "IV",
                  "level" => "28",
                ],
              ],
              "29" => [
                [
                  "jabatan" => "Direktur Bina Potensi Kawasan Transmigrasi ", 
                  "eselon" => "II",
                  "level" => "25",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Identifikasi dan Informasi Potensi Kawasan ", 
                  "eselon" => "III",
                  "level" => "24",
                ],
                [
                  "jabatan" => "Kepala Seksi Identifikasi Kawasan ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Seksi Informasi Potensi Kawasan ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Advokasi Kawasan ", 
                  "eselon" => "III",
                  "level" => "24",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Bahan Advokasi ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi dan Pelaporan ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Kawasan ", 
                  "eselon" => "III",
                  "level" => "24",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyusunan Rencana Kawasan ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Fasilitasi Penetapan Kawasan ", 
                  "eselon" => "III",
                  "level" => "24",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Seksi Penilaian Kawasan ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Mediasi dan Kerja Sama Antar Daerah ", 
                  "eselon" => "III",
                  "level" => "24",
                ],
                [
                  "jabatan" => "Kepala Seksi Mediasi Antar Daerah ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
                [
                  "jabatan" => "Kepala Seksi Kerja Sama Antar Daerah ", 
                  "eselon" => "IV",
                  "level" => "23",
                ],
              ],
              "21" => [
                [
                  "jabatan" => "Direktur Perencanaan Pembangunan dan Pengembangan Kawasan Transmigrasi ", 
                  "eselon" => "II",
                  "level" => "20",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Teknis Satuan Kawasan Pengembangan ", 
                  "eselon" => "III",
                  "level" => "19",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyusunan Rencana Satuan Kawasan Pengembangan ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Teknis Satuan Permukiman ",
                  "eselon" => "III",
                  "level" => "19",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengumpulan dan Pengolahan Data ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyusunan Rencana Satuan Permukiman ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Sarana dan Prasarana Kawasan ", 
                  "eselon" => "III",
                  "level" => "19",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Sarana ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Prasarana ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Perencanaan Pengembangan Masyarakat ", 
                  "eselon" => "III",
                  "level" => "19",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Pengembangan Ekonomi ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
                [
                  "jabatan" => "Kepala Seksi Perencanaan Pengembangan Sosial Budaya ", 
                  "eselon" => "IV",
                  "level" => "18",
                ],
              ],
              "27" => [
                [
                  "jabatan" => "Direktur Penyediaan Tanah Transmigrasi ", 
                  "eselon" => "II",
                  "level" => "15",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                  "level" => "13",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Fasilitasi Pencadangan Tanah ", 
                  "eselon" => "III",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Identifikasi Status dan Penggunaan Tanah ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengurusan Status Tanah ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Identifikasi dan Penataan Tanah ", 
                  "eselon" => "III",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Identifikasi Penggunaan dan Pemilikan Tanah ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Penataan Penggunaan dan Pemilikan Tanah ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Pengelolaan Tanah ", 
                  "eselon" => "III",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengurusan Hak Pengelolaan Lahan ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Pemeliharaan Hak Pengelolaan Lahan ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Dokumentasi Penyediaan Tanah ", 
                  "eselon" => "III",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengolahan Data ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyajian Informasi dan Pelaporan ", 
                  "eselon" => "IV",
                  "level" => "14",
                ],
              ],
              "33" => [
                [
                  "jabatan" => "Direktur Pembangunan Pemukiman Transmigrasi ", 
                  "eselon" => "II",
                  "level" => "10",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan dan Evaluasi Lahan Permukiman ", 
                  "eselon" => "III",
                  "level" => "9",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Lahan ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Penyiapan Lahan ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan dan Evaluasi Sarana Permukiman ", 
                  "eselon" => "III",
                  "level" => "9",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Sarana ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Penyiapan Sarana ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan dan Evaluasi Prasarana Permukiman ", 
                  "eselon" => "III",
                  "level" => "9",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyiapan Prasarana ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Penyiapan Prasarana ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Kelayakan Permukiman ", 
                  "eselon" => "III",
                  "level" => "9",
                ],
                [
                  "jabatan" => "Kepala Seksi Evaluasi Kelayakan ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
                [
                  "jabatan" => "Kepala Seksi Perwujudan Ruang ", 
                  "eselon" => "IV",
                  "level" => "8",
                ],
              ],
              "39" => [
                [
                  "jabatan" => "Direktur Penataan Persebaran Penduduk ", 
                  "eselon" => "II",
                  "level" => "5",
                ],
                [
                  "jabatan" => "Kepala Sub Bagian Tata Usaha ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan Perpindahan ", 
                  "eselon" => "III",
                  "level" => "4",
                ],
                [
                  "jabatan" => "Kepala Seksi Penyerasian Perpindahan ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Seksi Administrasi Perpindahan ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penyiapan Calon Transmigran dan Penduduk Setempat ", 
                  "eselon" => "III",
                  "level" => "4",
                ],
                [
                  "jabatan" => "Kepala Seksi Pendaftaran dan Seleksi",
                  "eselon" => "III",
                  "level" => "4",
                ],
                [
                  "jabatan" => "Kepala Seksi Keterampilan Calon Transmigran dan Penduduk Setempat ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Pelayanan Perpindahan ", 
                  "eselon" => "III",
                  "level" => "4",
                ],
                [
                  "jabatan" => "Kepala Seksi Penampungan dan Perbekalan ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Seksi Pengangkutan ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Sub Direktorat Penataan dan Adaptasi ", 
                  "eselon" => "III",
                  "level" => "4",
                ],
                [
                  "jabatan" => "Kepala Seksi Penataan ", 
                  "eselon" => "IV",
                  "level" => "3",
                ],
                [
                  "jabatan" => "Kepala Seksi Adaptasi ", 
                  "eselon" => "IV",
                  "level" => "3",
                ]
              ],
            ];

        foreach ($arr as $key => $jabatan) {
          foreach ($jabatan as $sub) {
            JabatanStruktural::create([
                'unit_kerja_id' => $key,
                'title' => $sub['jabatan'],
                'eselon' => $sub['eselon'],
                'level' => $sub['level'],
                'status' => 1
            ]);
          }
        }
    }
}
