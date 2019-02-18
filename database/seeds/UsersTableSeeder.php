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
            'name' => 'Matt Flack',
            'email' => 'matt.flack@acer.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Shane Bastin',
            'email' => 'shane.bastin@acer.com',
            'password' => bcrypt('password'),
        ]);
    }
}
