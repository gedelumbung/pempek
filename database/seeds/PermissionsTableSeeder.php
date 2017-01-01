<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Permission;
use Simpeg\Model\PermissionRole;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permission_role')->truncate();
        
        DB::statement(Storage::get('sql/permissions.sql'));
        DB::statement(Storage::get('sql/permission_role.sql'));

    }
}