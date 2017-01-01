<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement(Storage::get('sql/roles.sql'));
    }
}
