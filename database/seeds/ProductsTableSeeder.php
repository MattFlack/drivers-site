<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notebookNames = ['Switch 5', 'TravelMate P2510', 'TravelMate X3410', 'TravelMate P259', 'Swift 5'];
        $desktopNames = ['Veriton X2640G', 'Veriton X2660G', 'Veriton X4210G', 'Veriton X4660G', 'Veriton N4660G'];
        $serverNames = ['AT350 F3', 'Altos R360 F3', 'AR480 F3'];

        $notebookCategoryId = \App\ProductCategory::where('name', 'notebook')->first()->id;

        foreach($notebookNames as $notebookName) {
            factory('App\Product')->create(
                [
                    'user_id' => 1,
                    'name' => $notebookName,
                    'product_category_id' => $notebookCategoryId
                ]);
        }

        $desktopCategoryId = \App\ProductCategory::where('name', 'desktop')->first()->id;

        foreach($desktopNames as $desktopName) {
            factory('App\Product')->create(
                [
                    'user_id' => 1,
                    'name' => $desktopName,
                    'product_category_id' => $desktopCategoryId
                ]);
        }

        $serverCategoryId = \App\ProductCategory::where('name', 'server')->first()->id;

        foreach($serverNames as $serverName) {
            factory('App\Product')->create(
                [
                    'user_id' => 1,
                    'name' => $serverName,
                    'product_category_id' => $serverCategoryId
                ]);
        }
    }
}
