<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => SUPER_ADMIN_ROLE_NAME,
            'display_name' => SUPER_ADMIN_ROLE_DISPLAY_NAME,
            'description' => SUPER_ADMIN_ROLE_DESCRIPTION
        ]);
    }
}
