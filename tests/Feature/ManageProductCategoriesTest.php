<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProductCategoriesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function authorised_users_can_visit_the_categories_page()
    {
        $this->signIn();

        $this->get('/admin/product-categories')
            ->assertStatus(200)
            ->assertSee('Add Product Category');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_categories_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin/product-categories')
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

    /** @test */
    public function authorised_users_can_visit_the_edit_product_category_page()
    {
        $this->signIn();
        $productCategory = create('App\ProductCategory');

        $this->get($productCategory->path() . '/edit')
            ->assertStatus(200)
            ->assertSee($productCategory->name);
    }

    /** @test */
    public function unauthorised_users_may_not_visit_edit_product_category_pages()
    {
        $this->withExceptionHandling();
        $productCategory = create('App\ProductCategory');

        $this->get($productCategory->path() . '/edit')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_users_can_edit_a_product_category()
    {
        $this->signIn();

        $productCategory = create('App\ProductCategory', ['name' => 'unchanged']);

        $this->patch($productCategory->path(), ['name' => 'changed',]);

        $this->assertDatabaseHas('product_categories', ['name' => 'changed']);
    }

    /** @test */
    public function unauthorised_users_may_not_edit_a_product_category()
    {
        $this->withExceptionHandling();

        $productCategory = create('App\ProductCategory', ['name' => 'unchanged']);

        $this->patch($productCategory->path(), ['name' => 'changed',])
            ->assertRedirect('/login');

        $this->assertDatabaseHas('product_categories', ['name' => 'unchanged',]);

        $this->assertDatabaseMissing('product_categories', ['name' => 'changed']);
    }

    /** @test */
    public function admin_users_may_delete_product_categories()
    {
        $this->signIn();

        $category = create('App\ProductCategory', ['name' => 'Delete Me']);

        $this->assertDatabaseHas('product_categories', ['name' => 'Delete Me']);

        $this->delete($category->path());

        $this->assertDatabaseMissing('product_categories', ['name' => 'Delete Me']);
    }

    /** @test */
    public function unauthorised_users_may_not_delete_a_product_category()
    {
        $this->withExceptionHandling();

        $category = create('App\ProductCategory', ['name' => 'Delete Me']);

        $this->delete($category->path())
            ->assertRedirect('/login');

        $this->assertDatabaseHas('product_categories', ['name' => 'Delete Me']);
    }
}
