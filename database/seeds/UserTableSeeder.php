<?php

use Illuminate\Database\Seeder;
use Simpeg\Model\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        "name" => "Gede Lumbung",
        "email" => "gedesumawijaya@gmail.com",
        "nip" => "123456",
        "password" => bcrypt("123456"),
        "pegawai_id" => "1",
      ]);
    }
}
