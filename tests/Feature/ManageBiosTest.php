<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageBiosTest extends TestCase
{
    use RefreshDatabase;

    protected $product;

    public function setUp()
    {
        parent::setUp();
        $this->product = create('App\Product');
    }

    /** @test */
    public function authorised_users_can_visit_the_add_bios_page()
    {
        $this->signIn();

        $this->get($this->product->path() . '/bios/create')
            ->assertStatus(200)
            ->assertSee('Add Bios');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_add_bios_version_page()
    {
        $this->withExceptionHandling();

        $this->get($this->product->path() . '/bios/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_add_a_bios_to_a_product()
    {
        $this->signIn();
        $bios = make('App\Bios', ['user_id' => auth()->id(), 'product_id' => $this->product->id]);

        $this->post($this->product->path() . '/bios', $bios->toArray());

        $this->assertDatabaseHas('bios', $bios->toArray());
    }

    /** @test */
    public function unauthorised_users_may_not_add_bios()
    {
        $this->withExceptionHandling();

        $this->post($this->product->path() . '/bios', [])
            ->assertRedirect('/login');
    }

    /** @test */
    public function authorised_users_can_visit_the_edit_bios_page()
    {
        $this->signIn();
        $bios = create('App\Bios', ['product_id' => $this->product->id]);

        $this->get($bios->path() . '/edit')
            ->assertStatus(200)
            ->assertSee($bios->product->name);
    }

    /** @test */
    public function unauthorised_users_may_not_visit_edit_bios_pages()
    {
        $this->withExceptionHandling();
        $bios = create('App\Bios', ['product_id' => $this->product->id]);

        $this->get($bios->path() . '/edit')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_edit_a_bios()
    {
        $this->signIn();
        $bios = create('App\Bios', [
            'product_id' => $this->product->id,
            'url' => 'www.unchanged.com',
            'version' => '1.0'
        ]);

        $this->patch($bios->path(), [
            'url' => 'www.changed.com',
            'version' => '1.01'
        ]);

        $this->assertDatabaseHas('bios', [
            'url' => 'www.changed.com',
            'version' => '1.01'
        ]);
    }

    /** @test */
    public function unauthorised_users_may_not_edit_a_bios()
    {
        $this->withExceptionHandling();

        $bios = create('App\Bios', [
            'product_id' => $this->product->id,
            'url' => 'www.unchanged.com',
            'version' => '1.00'
        ]);

        $this->patch($bios->path(), [
            'url' => 'www.changed.com',
            'version' => '1.01'
        ])->assertRedirect('/login');

        $this->assertDatabaseHas('bios', [
            'url' => 'www.unchanged.com',
            'version' => '1.00'
        ]);

        $this->assertDatabaseMissing('bios', [
            'url' => 'www.changed.com',
            'version' => '1.01'
        ]);
    }

    /** @test */
    public function admin_users_may_delete_bioses()
    {
        $this->signIn();

        $bios = create('App\Bios', ['url' => 'www.DeleteMe.com']);

        $this->assertDatabaseHas('bios', ['url' => 'www.DeleteMe.com']);

        $this->delete($bios->path());

        $this->assertDatabaseMissing('bios', ['url' => 'www.DeleteMe.com']);
    }

    /** @test */
    public function unauthorised_users_may_not_delete_a_bios()
    {
        $this->withExceptionHandling();

        $bios = create('App\Bios', ['url' => 'www.DeleteMe.com']);

        $this->delete($bios->path())
            ->assertRedirect('/login');

        $this->assertDatabaseHas('bios', ['url' => 'www.DeleteMe.com']);
    }
}
