<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\UnitKerja;
use Simpeg\Model\SatuanKerja;

class SatuanKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('satuan_kerja')->truncate();

        $satuan_kerja_params = [
            [
                [
                    'Direktorat Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi (DITJEN)',
                ],
                [
                    'Sekretariat Jenderal Penyiapan Kawasan dan Pembangunan Permukiman Transmigrasi (SETDITJEN)',
                ],
                [
                    'Direktorat Bina Potensi Kawasan Transmigrasi (BINA POTENSI)',
                ],
                [
                    'Direktorat Perencanaan Pembangunan dan Pengembangan Kawasan Transmigrasi (P3KT)',
                ],
                [
                    'Direktorat Penyediaan Tanah Transmigrasi (PTT) ',
                ],
                [
                    'Direktorat Pembangunan Pemukiman Transmigrasi (P2T) ',
                ],
                [
                    'Direktorat Penataan Persebaran Penduduk  (P3)',
                ],
            ],
            [
                [
                    'Bagian Perencanaan ',
                    'Sub Bagian Penyusunan Program dan Anggaran ',
                    'Sub Bagian Data dan Informasi ',
                    'Sub Bagian Evaluasi dan Pelaporan '
                ],
                [
                    'Bagian Keuangan dan Barang Milik Negara ',
                    'Sub Bagian Pelaksanaan Anggaran ',
                    'Sub Bagian Pembendaharaan ',
                    'Sub Bagian Akuntansi dan Barang Milik Negara '
                ],
                [
                    'Bagian Kepegawaian dan Umum ',
                    'Sub Bagian Kepegawaian ',
                    'Sub Bagian Persuratan ',
                    'Sub Bagian Perlengkapan dan Rumah Tangga '
                ],
                [
                    'Bagian Hukum, Organisasi, dan Tata Laksana ',
                    'Sub Bagian Penyusunan Peraturan Perundang Undangan ',
                    'Sub Bagian Advokasi Hukum ',
                    'Sub Bagian Organisasi dan Tata Laksana '
                ]
            ],
            [
                [
                    'Sub Bagian Tata Usaha ',
                ],
                [
                    'Sub Direktorat Identifikasi dan Informasi Potensi Kawasan ',
                    'Seksi Identifikasi Kawasan ',
                    'Seksi Informasi Potensi Kawasan '
                ],
                [
                    'Sub Direktorat Advokasi Kawasan ',
                    'Seksi Penyiapan Bahan Advokasi ',
                    'Seksi Evaluasi dan Pelaporan '
                ],
                [
                    'Sub Direktorat Advokasi Kawasan ',
                    'Seksi Penyiapan Bahan Advokasi ',
                    'Seksi Evaluasi dan Pelaporan '
                ],
                [
                    'Sub Direktorat Perencanaan Kawasan ',
                    'Seksi Pengumpulan dan Pengolahan Data ',
                    'Seksi Penyusunan Rencana Kawasan '
                ],
                [
                    'Sub Direktorat Fasilitasi Penetapan Kawasan ',
                    'Seksi Pengumpulan dan Pengolahan Data ',
                    'Seksi Penyusunan Rencana Kawasan '
                ],
                [
                    'Sub Direktorat Mediasi dan Kerja Sama Antar Daerah ',
                    'Seksi Mediasi Antar Daerah ',
                    'Seksi Kerja Sama Antar Daerah'
                ],
            ],
            [
                [
                    'Sub Bagian Tata Usaha ',
                ],
                [
                    'Sub Direktorat Perencanaan Teknis Satuan Kawasan Pengembangan ',
                    'Seksi Pengumpulan dan Pengolahan Data  ',
                    'Seksi Penyusunan Rencana Satuan Kawasan Pengembangan '
                ],
                [
                    'Sub Direktorat Perencanaan Teknis Satuan Permukiman ',
                    'Seksi Pengumpulan dan Pengolahan Data ',
                    'Seksi Penyusunan Rencana Satuan Permukiman '
                ],
                [
                    'Sub Direktorat Perencanaan Sarana dan Prasarana Kawasan ',
                    'Seksi Perencanaan Sarana ',
                    'Seksi Perencanaan Prasarana '
                ],
                [
                    'Sub Direktorat Perencanaan Pengembangan Masyarakat ',
                    'Seksi Perencanaan Pengembangan Ekonomi ',
                    'Seksi Perencanaan Pengembangan Sosial Budaya '
                ]
            ],
            [
                [
                    'Sub Bagian Tata Usaha ',
                ],
                [
                    'Sub Direktorat Fasilitasi Pencadangan Tanah ',
                    'Seksi Identifikasi Status dan Penggunaan Tanah ',
                    'Seksi Pengurusan Status Tanah '
                ],
                [
                    'Sub Direktorat Identifikasi dan Penataan Tanah ',
                    'Seksi Identifikasi Penggunaan dan Pemilikan Tanah ',
                    'Seksi Penataan Penggunaan dan Pemilikan Tanah '
                ],
                [
                    'Sub Direktorat Pengelolaan Tanah ',
                    'Seksi Pengurusan Hak Pengelolaan Lahan ',
                    'Seksi Pemeliharaan Hak Pengelolaan Lahan '
                ],
                [
                    'Sub Direktorat Dokumentasi Penyediaan Tanah ',
                    'Seksi Pengolahan Data ',
                    'Seksi Penyajian Informasi dan Pelaporan '
                ]
            ],
            [
                [
                    'Sub Bagian Tata Usaha ',
                ],
                [
                    'Sub Direktorat Penyiapan dan Evaluasi Lahan Permukiman ',
                    'Seksi Penyiapan Lahan ',
                    'Seksi Evaluasi Penyiapan Lahan '
                ],
                [
                    'Sub Direktorat Penyiapan dan Evaluasi Sarana Permukiman ',
                    'Seksi Penyiapan Sarana ',
                    'Seksi Evaluasi Penyiapan Sarana '
                ],
                [
                    'Sub Direktorat Penyiapan dan Evaluasi Prasarana Permukiman ',
                    'Seksi Penyiapan Prasarana ',
                    'Seksi Evaluasi Penyiapan Prasarana '
                ],
                [
                    'Sub Direktorat Kelayakan Permukiman ',
                    'Seksi Evaluasi Kelayakan ',
                    'Seksi Perwujudan Ruang '
                ]
            ],
            [
                [
                    'Sub Bagian Tata Usaha ',
                ],
                [
                    'Sub Direktorat Penyiapan Perpindahan ',
                    'Seksi Penyerasian Perpindahan ',
                    'Seksi Administrasi Perpindahan '
                ],
                [
                    'Sub Direktorat Penyiapan Calon Transmigran dan Penduduk Setempat ',
                    'Seksi Pendaftaran dan Seleksi',
                    'Seksi Penampungan dan Perbekalan '
                ],
                [
                    'Sub Direktorat Pelayanan Perpindahan ',
                    'Seksi Penampungan dan Perbekalan ',
                    'Seksi Pengangkutan '
                ],
                [
                    'Sub Direktorat Penataan dan Adaptasi ',
                    'Seksi Penataan ',
                    'Seksi Adaptasi '
                ]
            ],
        ];

        $unitKerja = UnitKerja::where('parent_id',0)->get();

        foreach ($unitKerja as $key_unit_kerja => $unit_kerja) {
            $satuan_kerja = $satuan_kerja_params[$key_unit_kerja];
            $child_unit_kerja = UnitKerja::where('parent_id', $unit_kerja->id)->get();

            foreach ($child_unit_kerja as $key_sub_unit_kerja => $sub_unit_kerja) {
                $sub_satuan_kerja = $satuan_kerja[$key_sub_unit_kerja];

                foreach ($sub_satuan_kerja as $key => $value) {
                    SatuanKerja::create([
                        'unit_kerja_id' =>  $sub_unit_kerja->id,
                        'title'         =>  $value
                    ]);
                }
            }
        }
    }
}
