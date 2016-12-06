<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\UnitKerja;

class UnitKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('unit_kerja')->truncate();

        $unit_kerja = [
            'DITJEN' => [
                'Direktorat Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi',
                'Sekretariat Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi',
                'Direktorat Bina Potensi Kawasan Transmigrasi',
                'Direktorat Perencanaan Pembangunan dan Pengembangan Kawasan Transmigrasi',
                'Direktorat Penyediaan Tanah Transmigrasi',
                'Direktorat Pembangunan Pemukiman Transmigrasi',
                'Direktorat Penataan Persebaran Penduduk'
            ],
            'SETDITJEN' => [
                'Bagian Perencanaan',
                'Bagian Keuangan dan Barang Milik Negara',
                'Bagian Kepegawaian dan Umum',
                'Bagian Hukum, Organisasi, dan Tata Laksana'
            ],
            'Bina Potensi' => [
                'Sub Bagian Tata Usaha ',
                'Sub Direktorat Identifikasi dan Informasi Potensi Kawasan ',
                'Sub Direktorat Advokasi Kawasan ',
                'Sub Direktorat Perencanaan Kawasan',
                'Sub Direktorat Fasilitasi Penetapan Kawasan ',
                'Sub Direktorat Mediasi dan Kerja Sama Antar Daerah '
            ],
            'P3KT' => [
                'Sub Bagian Tata Usaha ',
                'Sub Direktorat Perencanaan Teknis Satuan Kawasan Pengembangan ',
                'Sub Direktorat Perencanaan Teknis Satuan Permukiman ',
                'Sub Direktorat Perencanaan Sarana dan Prasarana Kawasan ',
                'Sub Direktorat Perencanaan Pengembangan Masyarakat '
            ],
            'PTT' => [
                'Sub Bagian Tata Usaha ',
                'Sub Direktorat Fasilitasi Pencadangan Tanah ',
                'Sub Direktorat Identifikasi dan Penataan Tanah ',
                'Sub Direktorat Pengelolaan Tanah ',
                'Sub Direktorat Dokumentasi Penyediaan Tanah '
            ],
            'P2T' => [
                'Sub Bagian Tata Usaha ',
                'Sub Direktorat Penyiapan dan Evaluasi Lahan Permukiman ',
                'Sub Direktorat Penyiapan dan Evaluasi Sarana Permukiman ',
                'Sub Direktorat Penyiapan dan Evaluasi Prasarana Permukiman ',
                'Sub Direktorat Kelayakan Permukiman '
            ],
            'P3' => [
                'Sub Bagian Tata Usaha ',
                'Sub Direktorat Penyiapan Perpindahan ',
                'Sub Direktorat Penyiapan Calon Transmigran dan Penduduk Setempat ',
                'Sub Direktorat Pelayanan Perpindahan ',
                'Sub Direktorat Penataan dan Adaptasi '
            ]
        ];

        $description = [
            'Direktorat Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi',
            'Sekretariat Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi',
            'Direktorat Bina Potensi Kawasan Transmigrasi',
            'Direktorat Perencanaan Pembangunan dan Pengembangan Kawasan Transmigrasi',
            'Direktorat Penyediaan Tanah Transmigrasi',
            'Direktorat Pembangunan Pemukiman Transmigrasi',
            'Direktorat Penataan Persebaran Penduduk'
        ];

        $count = 0;
        foreach ($unit_kerja as $key => $parent_unit_kerja) {
            $parent = UnitKerja::create([
                'title' => $key,
                'description' => $description[$count]
            ]);

            foreach ($parent_unit_kerja as $sub_unit_kerja) {
                UnitKerja::create([
                    'parent_id' => $parent->id,
                    'title' => $sub_unit_kerja
                ]);
            }
            $count++;
        }
    }
}
