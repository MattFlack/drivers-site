<?php

use App\User;
use App\Product;
use App\OSVersion;
use Illuminate\Database\Seeder;

class DriverKitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $osVersions = OSVersion::all();
        $users = User::all();

        foreach($products as $product) {
            foreach ($osVersions as $osVersion) {
                factory('App\DriverKit')->create(
                    [
                        'user_id' => $users->random()->id,
                        'url' => 'http://www.acer.com/downloads/drivers.exe',
                        'os_version_id' => $osVersion->id,
                        'product_id' => $product->id
                    ]);
            }
        }


    }
}
