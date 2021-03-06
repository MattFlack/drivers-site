<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminFeaturesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authorised_users_can_visit_the_admin_page_which_redirects_to_admin_product_page()
    {
        $this->signIn();

        $this->get('/admin')
            ->assertRedirect('/admin/products');
    }

    /** @test */
    public function unauthorised_users_may_not_visit_the_admin_page()
    {
        $this->withExceptionHandling();

        $this->get('/admin')
            ->assertRedirect('/login');
    }

}
