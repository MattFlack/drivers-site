<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function has_bioses()
    {
        $product = create('App\Product');
        $bios = create('App\Bios', ['product_id' => $product->id]);

        $this->assertInstanceOf('App\Bios', $product->bioses[0]);
        $this->assertEquals($bios->id, $product->bioses[0]->id);
    }

    /** @test */
    public function deleting_a_product_also_deletes_its_drivers()
    {
        $product = create('App\Product');
        $driverKit = create('App\DriverKit', ['product_id' => $product->id]);

        $this->assertDatabaseHas('driver_kits', ['id' => $driverKit->id]);

        $product->delete();

        $this->assertDatabaseMissing('driver_kits', ['id' => $driverKit->id]);
    }

    /** @test */
    public function deleting_a_product_also_deletes_its_bioses()
    {
        $product = create('App\Product');
        $bios = create('App\Bios', ['product_id' => $product->id]);

        $this->assertDatabaseHas('bios', ['id' => $bios->id]);

        $product->delete();

        $this->assertDatabaseMissing('bios', ['id' => $bios->id]);
    }
}
