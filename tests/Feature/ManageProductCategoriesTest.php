<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProductCategoriesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function authorised_users_can_visit_the_create_category_page()
    {
        $this->signIn();

        $this->get('/admin/product-categories/create')
            ->assertStatus(200)
            ->assertSee('Add Product Category');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_create_category_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin/product-categories/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_add_product_categories()
    {
        $this->signIn();
        $productCategory = make('App\ProductCategory', ['user_id' => auth()->id()]);

        $this->post('/admin/product-categories', $productCategory->toArray());

        $this->assertDatabaseHas('product_categories', $productCategory->toArray());
    }

    /** @test */
    public function unauthorised_users_may_not_add_product_categories()
    {
        $this->withExceptionHandling();

        $this->post('/admin/product-categories', [])
            ->assertRedirect('/login');
    }
}