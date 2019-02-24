<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authorised_users_can_visit_the_create_product_page()
    {
        $this->signIn();

        $this->get('/admin/products/create')
            ->assertStatus(200)
            ->assertSee('Add Product');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_create_product_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin/products/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_add_products()
    {
        $this->signIn();
        $product = make('App\Product', ['user_id' => auth()->id()]);

        $this->post('/admin/products', $product->toArray());

        $this->assertDatabaseHas('products', $product->toArray());
    }

    /** @test */
    public function unauthorised_users_may_not_add_products()
    {
        $this->withExceptionHandling();

        $this->post('/admin/products', [])
            ->assertRedirect('/login');
    }

    /** @test */
    public function authorised_users_can_visit_the_product_page()
    {
        $this->signIn();
        $product = create('App\Product');

        $this->get('/admin/products/' . $product->id)
            ->assertStatus(200)
            ->assertSee($product->name);
    }

    /** @test */
    public function unauthorised_users_may_not_visit_product_pages()
    {
        $this->withExceptionHandling();

        $product = create('App\Product');

        $this->get($product->path())
            ->assertRedirect('/login');
    }
}
