<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
    use RefreshDatabase;
    /** @test
     * Need to reimport the index after running this test as there is a id conflict with the indexed data.
     * Need to find a solution to this possibly by having an id range set aside for testing purposes.
     * php artisan scout:import App\\Product
     */
    public function a_user_can_search_products()
    {
        config(['scout.driver' => 'algolia']);

        $searchWord = 'FooBar';

        create('App\Product', [], 2);
        create('App\Product', ['name' => $searchWord], 2);

        do {
            sleep(.25);
            $results = $this->getJson("/products/search?q={$searchWord}")->json()['data'];
        } while(empty($results));

        $this->assertCount(2, $results);

        // Remove from index
        Product::latest()->take(4)->unsearchable();
    }


//    /** @test
//     * This test is for TNT Search driver which is free, may have to revert back to this once Algolia
//     * trial period is over.
//     *
//     * Need to reimport the index after running this test as there is a id conflict with the indexed data.
//     * Need to find a solution to this possibly by having an id range set aside for testing purposes.
//     * php artisan scout:import App\\Product
//     */
//    public function a_user_can_search_products()
//    {
//        $this->assertTrue(true);

//        config(['scout.driver' => 'tntsearch']);
//
//        $searchWord = 'FooBar';
//
//        create('App\Product', [], 2);
//        create('App\Product', ['name' => $searchWord], 2);
//
//        $results = $this->getJson("/products/search?q={$searchWord}")->json();
//
//        $this->assertCount(2, $results['data']);
//
//        // Remove from index
//        Product::latest()->take(4)->unsearchable();
//    }
}
