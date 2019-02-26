<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageOSVersionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authorised_users_can_visit_the_os_versions_page()
    {
        $this->signIn();

        $this->get('/admin/os-versions')
            ->assertStatus(200)
            ->assertSee('Add OS Version');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_os_versions_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin/os-versions')
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

    /** @test */
    public function authorised_users_can_visit_the_edit_os_version_page()
    {
        $this->signIn();
        $osVersion = create('App\OSVersion');

        $this->get($osVersion->path() . '/edit')
            ->assertStatus(200)
            ->assertSee($osVersion->name);
    }

    /** @test */
    public function unauthorised_users_may_not_visit_edit_os_version_pages()
    {
        $this->withExceptionHandling();
        $osVersion = create('App\OSVersion');

        $this->get($osVersion->path() . '/edit')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_user_can_edit_an_os_version()
    {
        $this->signIn();

        $osVersion = create('App\OSVersion', ['name' => 'unchanged',]);

        $this->patch($osVersion->path(), ['name' => 'changed',]);

        $this->assertDatabaseHas('os_versions', ['name' => 'changed',]);
    }

    /** @test */
    public function unauthorised_users_may_not_edit_an_os_version()
    {
        $this->withExceptionHandling();

        $osVersion = create('App\OSVersion', ['name' => 'unchanged',]);

        $this->patch($osVersion->path(), ['name' => 'changed',])
            ->assertRedirect('/login');

        $this->assertDatabaseHas('os_versions', ['name' => 'unchanged',]);

        $this->assertDatabaseMissing('os_versions', ['name' => 'changed']);
    }
}
