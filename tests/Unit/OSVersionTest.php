<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OSVersionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function has_a_path()
    {
        $osVersion = create('App\OSVersion');

        $this->assertEquals('/admin/os-versions/' . $osVersion->id, $osVersion->path());
    }
}
