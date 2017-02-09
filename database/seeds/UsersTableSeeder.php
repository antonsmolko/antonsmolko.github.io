<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => SUPER_ADMIN_NAME,
            'login' => SUPER_ADMIN_LOGIN,
            'email' => SUPER_ADMIN_EMAIL,
            'password' => bcrypt(SUPER_ADMIN_PASSWORD),
        ]);
    }
}
