<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdminFeaturesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function authorised_users_can_visit_the_admin_page()
    {
        $this->signIn();

        $this->get('/admin')
            ->assertStatus(200)
            ->assertSee('Products');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_admin_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin')
            ->assertRedirect('/login');
    }



    /** PRODUCTS */

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

    /** PRODUCT CATEGORIES */

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


    /** OS VERSIONS */

    /** @test */
    public function authorised_users_can_visit_the_create_os_version_page()
    {
        $this->signIn();

        $this->get('/admin/os-versions/create')
            ->assertStatus(200)
            ->assertSee('Add OS Version');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_create_os_version_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin/os-versions/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_add_os_versions()
    {
        $this->signIn();
        $osVersion = make('App\OSVersion', ['user_id' => auth()->id()]);

        $this->post('/admin/os-versions', $osVersion->toArray());

        $this->assertDatabaseHas('os_versions', $osVersion->toArray());
    }

    /** @test */
    public function unauthorised_users_may_not_add_os_versions()
    {
        $this->withExceptionHandling();

        $this->post('/admin/os-versions', [])
            ->assertRedirect('/login');
    }


    /** DRIVER KITS */

    /** @test */
    public function admin_user_can_add_a_driver_kit_to_a_product()
    {
        $this->signIn();
        $product = create('App\Product');

        $driverKit = make('App\DriverKit', ['user_id' => auth()->id(), 'product_id' => $product->id]);

        $this->post($product->path() . '/driver-kits', $driverKit->toArray());

        $this->assertDatabaseHas('driver_kits', $driverKit->toArray());
    }

    /** @test */
    public function unauthorised_users_may_not_add_driver_kits()
    {
        $this->withExceptionHandling();

        $product = create('App\Product');

        $this->post($product->path() . '/driver-kits', [])
            ->assertRedirect('/login');
    }

}
