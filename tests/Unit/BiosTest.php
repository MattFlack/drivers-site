<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BiosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function has_a_product()
    {
        $product = create('App\Product');

        $bios = create('App\Bios', ['product_id' => $product]);

        $this->assertInstanceOf('App\Product', $bios->product);
        $this->assertEquals($product->id, $bios->product->id);
    }

    /** @test */
    public function has_a_path()
    {
        $product = create('App\Product');
        $bios = create('App\Bios', ['product_id' => $product]);

        $this->assertEquals($product->path() . '/bios/' . $bios->id, $bios->path());
    }
}
