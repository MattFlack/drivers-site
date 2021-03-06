<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ProductCategoriesTableSeeder::class);
         $this->call(OSVersionsTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(DriverKitsTableSeeder::class);
         $this->call(BiosTableSeeder::class);
    }
}
