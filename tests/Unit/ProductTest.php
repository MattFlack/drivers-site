<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function has_a_creator()
    {
        $this->signIn();
        $product = create('App\Product', ['user_id' => auth()->id()]);

        $this->assertInstanceOf('App\User', $product->creator);
        $this->assertEquals(auth()->id(), $product->creator->id);
    }

    /** @test */
    public function has_a_category()
    {
        $category = create('App\ProductCategory');
        $product = create('App\Product', ['product_category_id' => $category->id]);

        $this->assertInstanceOf('App\ProductCategory', $product->category);
        $this->assertEquals($category->id, $product->category->id);
    }

    /** @test */
    public function has_a_path()
    {
        $product = create('App\Product');

        $this->assertEquals('/admin/products/' . $product->id, $product->path());
    }

    /** @test */
    public function has_drivers()
    {
        $product = create('App\Product');
        $driverKit = create('App\DriverKit', ['product_id' => $product->id]);

        $this->assertInstanceOf('App\DriverKit', $product->driverKits[0]);
        $this->assertEquals($driverKit->id, $product->driverKits[0]->id);
    }
}
