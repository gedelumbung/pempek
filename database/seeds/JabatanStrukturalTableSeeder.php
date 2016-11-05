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

        foreach ($satuanKerja as $key => $satuan) {
          $title = str_replace(["Sekretariat", "Sub Bagian", "Seksi", "Direktorat", "Bagian"], ["Sekretaris", "Kepala Sub Bagian", "Kepala Seksi", "Direktur", "Kepala Bagian"], $satuan->title);
          $title = str_replace(["Sub Direktur", "Kepala Sub Kepala Bagian"], ["Kepala Sub Direktorat", "Kepala Sub Bagian"], $title);

          JabatanStruktural::create([
              'satuan_kerja_id' => $satuan->id,
              'title' => $title,
              'eselon' => 1,
              'status' => 1
          ]);
        }
    }
}
