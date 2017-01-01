<?php

use Illuminate\Database\Seeder;
use Simpeg\Model\User;
use Simpeg\Model\RoleUser;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users')->truncate();
      DB::table('role_user')->truncate();

      DB::statement(Storage::get('sql/users.sql'));
      DB::statement(Storage::get('sql/role_user.sql'));
    }
}
