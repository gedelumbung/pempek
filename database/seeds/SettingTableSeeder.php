<?php

use Illuminate\Database\Seeder;
use Simpeg\Model\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('settings')->truncate();

      Setting::create([
        "title" => "Kantor 1",
        "content" => "Kantor 1 : Jl. TMP Kalibata No.17, Jakarta Selatan,12750, DKI Jakarta, Indonesia",
      ]);

      Setting::create([
        "title" => "Kantor 2",
        "content" => "Kantor 2 : Jl. Abdul Muis No.7, RT.2/RW.3, Gambir, Jakarta Pusat, DKI Jakarta, Indonesia",
      ]);

      Setting::create([
        "title" => "Telpon",
        "content" => "Telp: (021) 3500334",
      ]);

      Setting::create([
        "title" => "Email",
        "content" => "Email: humas@kemendesa.go.id",
      ]);

      Setting::create([
        "title" => "Facebook",
        "content" => "http://www.facebook.com",
      ]);

      Setting::create([
        "title" => "Twitter",
        "content" => "http://www.twitter.com",
      ]);

      Setting::create([
        "title" => "Linkedin",
        "content" => "http://www.linkedin.com",
      ]);

      Setting::create([
        "title" => "Nama Instansi",
        "content" => "Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi Republik Indonesia",
      ]);
    }
}
