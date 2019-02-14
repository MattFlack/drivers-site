<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = ['Notebook', 'Desktop', 'Server'];

        foreach($categoryNames as $categoryName) {
            factory('App\ProductCategory')->create(['user_id' => 1,'name' => $categoryName]);
        }
    }
}
