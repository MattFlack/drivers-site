<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Matt',
            'email' => 'matt.flack@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
