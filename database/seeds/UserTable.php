<?php

use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'level' =>'admin',
        	'name' => 'Admin',
        	'username' =>'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('admin123'),
        	'nohp' =>'081387884900',
        ]);
    }
}
