<?php

use App\User;
use App\Product;
use Illuminate\Database\Seeder;

class BiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $users = User::all();

        foreach($products as $product) {
            factory('App\Bios')->create(
                [
                    'user_id' => $users->random()->id,
                    'url' => 'http://www.acer.com/downloads/bios.zip',
                    'product_id' => $product->id
                ]);
        }
    }
}
