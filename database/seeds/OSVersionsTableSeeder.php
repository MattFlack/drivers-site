<?php

use Illuminate\Database\Seeder;

class OSVersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $osVersionNames = ['Win 10 64bit (1809)', 'Win 10 64bit (1803)', 'Win 8.1 64bit', 'Win 7 64bit', 'Win 7 32bit'];

        foreach($osVersionNames as $osVersionName) {
            factory('App\OSVersion')->create(['user_id' => 1,'name' => $osVersionName]);
        }
    }
}
