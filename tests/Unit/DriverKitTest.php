<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DriverKitTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function has_an_os_version()
    {
        $osVersion = create('App\OSVersion');
        $driverKit = create('App\DriverKit', ['os_version_id' => $osVersion->id]);

        $this->assertInstanceOf('App\OSversion', $driverKit->osVersion);
        $this->assertEquals($osVersion->id, $driverKit->osVersion->id);
    }

    /** @test */
    public function has_a_filename()
    {
        $driverKit = create('App\DriverKit', ['url' => 'http://www.downloads.com/driver.exe']);

        $this->assertEquals('driver.exe', $driverKit->fileName());
    }
}
