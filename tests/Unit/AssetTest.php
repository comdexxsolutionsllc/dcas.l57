<?php

namespace Tests\Unit;

use App\Models\General\Asset;
use App\Models\Support\Datacenter;
use App\Models\Support\NetworkDevice;
use App\Models\Support\NetworkDeviceType;
use App\Models\Support\OperatingSystem;
use App\Models\Support\SwitchportInformation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssetTest extends TestCase
{

    use RefreshDatabase;

    protected $asset;

    protected $datacenter;

    protected $networkDevice;

    protected $networkDeviceType;

    protected $operatingSystem;

    protected $switchport;

    /** @test */
    public function an_asset_has_a_datacenter()
    {
        $this->assertNotNull($this->asset->datacenter);
    }

    /** @test */
    public function an_asset_has_a_network_device()
    {
        $this->assertNotNull($this->asset->networkDevice);
    }

    /** @test */
    public function an_asset_has_an_operating_system()
    {
        $this->assertNotNull($this->asset->operatingSystem);
    }

    /** @test */
    public function an_asset_has_a_switchport()
    {
        $this->assertNotNull($this->asset->switchport);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->datacenter = factory(Datacenter::class)->create();
        $this->networkDeviceType = factory(NetworkDeviceType::class)->create();
        $this->networkDevice = factory(NetworkDevice::class)->create([
            'network_device_type_id' => $this->networkDeviceType->id,
        ]);
        $this->operatingSystem = factory(OperatingSystem::class)->create();
        $this->switchport = factory(SwitchportInformation::class)->create();

        $this->asset = factory(Asset::class)->create([
            'datacenter_id'       => $this->datacenter->id,
            'network_device_id'   => $this->networkDevice->id,
            'operating_system_id' => $this->operatingSystem->id,
            'switchport_id'       => $this->switchport->id,
        ]);
    }
}
