<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminFeaturesTest extends TestCase
{
    use RefreshDatabase;

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

}
