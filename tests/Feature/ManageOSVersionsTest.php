<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageOSVersionsTest extends TestCase
{
    use RefreshDatabase;

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
}
