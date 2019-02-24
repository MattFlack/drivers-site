<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDriverKitsTest extends TestCase
{
    use RefreshDatabase;

    protected $product;

    public function setUp()
    {
        parent::setUp();
        $this->product = create('App\Product');
    }

    /** @test */
    public function authorised_users_can_visit_the_add_drivers_page()
    {
        $this->signIn();

        $this->get($this->product->path() . '/driver-kits/create')
            ->assertStatus(200)
            ->assertSee('Add Driver Kit');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_add_drivers_page()
    {
        $this->withExceptionHandling();

        $this->get($this->product->path() . '/driver-kits/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_add_a_driver_kit_to_a_product()
    {
        $this->signIn();
        $driverKit = make('App\DriverKit', ['user_id' => auth()->id(), 'product_id' => $this->product->id]);

        $this->post($this->product->path() . '/driver-kits', $driverKit->toArray());

        $this->assertDatabaseHas('driver_kits', $driverKit->toArray());
    }

    /** @test */
    public function unauthorised_users_may_not_add_driver_kits()
    {
        $this->withExceptionHandling();

        $this->post($this->product->path() . '/driver-kits', [])
            ->assertRedirect('/login');
    }

    /** @test */
    public function authorised_users_can_visit_the_edit_driver_page()
    {
        $this->signIn();
        $driverKit = create('App\DriverKit', ['user_id' => auth()->id(), 'product_id' => $this->product->id]);

        $this->get($driverKit->path() . '/edit')
            ->assertStatus(200)
            ->assertSee($driverKit->product->name);
    }

    /** @test */
    public function unauthorised_users_may_not_visit_edit_driver_pages()
    {
        $this->withExceptionHandling();

        $driverKit = create('App\DriverKit', ['product_id' => $this->product->id]);

        $this->get($driverKit->path() . '/edit')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_edit_a_driver_kit()
    {
        $this->signIn();

        $driverKit = create('App\DriverKit', ['user_id' => auth()->id(), 'product_id' => $this->product->id]);

        $this->patch($driverKit->path(), ['url' => 'www.changed.com']);

        $this->assertDatabaseHas('driver_kits', [
            'url' => 'www.changed.com'
        ]);
    }

    /** @test */
    public function unauthorised_users_may_not_edit_a_driver_kit()
    {
        $this->withExceptionHandling();

        $driverKit = create('App\DriverKit', [
            'product_id' => $this->product->id,
            'url' => 'www.unchanged.com'
        ]);

        $this->patch($driverKit->path(), ['url' => 'www.changed.com'])
            ->assertRedirect('/login');

        $this->assertDatabaseHas('driver_kits', [
            'url' => 'www.unchanged.com'
        ]);

        $this->assertDatabaseMissing('driver_kits', [
            'url' => 'www.changed.com'
        ]);
    }
}
