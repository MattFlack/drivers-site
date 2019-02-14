<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCategoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function has_products()
    {
        $category = create('App\ProductCategory');
        $product = create('App\Product', ['product_category_id' => $category->id]);

        $this->assertInstanceOf('App\Product', $category->products[0]);
        $this->assertEquals($product->id, $category->products[0]->id);
    }
}
