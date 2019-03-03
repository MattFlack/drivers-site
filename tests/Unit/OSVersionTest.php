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

    /** @test */
    public function has_driver_kits()
    {
        $osVersion = create('App\OSVersion');
        $driverKit = create('App\DriverKit', ['os_version_id' => $osVersion->id]);

        $this->assertInstanceOf('App\DriverKit', $osVersion->driverKits[0]);
        $this->assertEquals($driverKit->id, $osVersion->driverKits[0]->id);
    }

    /** @test */
    public function deleting_an_os_version_also_deletes_its_drivers()
    {
        $osVersion = create('App\OSVersion');
        $driverKit = create('App\DriverKit', ['os_version_id' => $osVersion->id]);

        $this->assertDatabaseHas('driver_kits', ['id' => $driverKit->id]);

        $osVersion->delete();

        $this->assertDatabaseMissing('driver_kits', ['id' => $driverKit->id]);
    }
}
