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

    /** @test */
    public function has_a_path()
    {
        $productCategory = create('App\ProductCategory');

        $this->assertEquals('/admin/product-categories/' . $productCategory->id, $productCategory->path());
    }

    /** @test */
    public function deleting_a_product_category_also_deletes_its_products()
    {
        $category = create('App\ProductCategory');
        $product = create('App\Product', ['product_category_id' => $category->id]);

        $this->assertDatabaseHas('products', ['id' => $product->id]);

        $category->delete();

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
