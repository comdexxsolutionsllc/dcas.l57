<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\Asset::class, function (Faker $faker) {
    return [
        'serial_number'           => \App\General\DCASHelper::make_serial_number(),
        'hardware_id'             => \App\General\HardwareId::generate(),
        'status'                  => $faker->word,
        'datacenter_id'           => function () use ($faker) {
            return $faker->randomElement(\App\Models\Support\Datacenter::pluck('id')->all());
        },
        'network_device_id'       => function () use ($faker) {
            return $faker->randomElement(\App\Models\Support\NetworkDevice::pluck('id')->all());
        },
        'switchport_id'           => function () use ($faker) {
            return $faker->randomElement(\App\Models\Support\SwitchportInformation::pluck('id')->all());
        },
        'network_interface_cards' => 'NIC INFORMATION GOES HERE',
        'port_speed'              => 'PORT SPEED GOES HERE',
        'private_ip'              => $faker->localIpv4,
        'chassis'                 => 'CHASSIS GOES HERE',
        'motherboard_type'        => 'MOTHERBOARD GOES HERE',
        'cpus'                    => 'CPUS GO HERE',
        'memory'                  => 'MEMORY GOES HERE',
        'disks'                   => 'DISKS GO HERE',
        'operating_system_id'     => function () use ($faker) {
            return $faker->randomElement(\App\Models\Support\OperatingSystem::pluck('id')->all());
        },
        'control_panel'           => null,
        'administrator_password'  => \App\General\DCASHelper::random_password(),
        'onhand_qty'              => $faker->randomDigit,
        'pending_testing_qty'     => $faker->randomDigit,
        'rma_qty'                 => $faker->randomDigit,
        'last_checkin'            => function () use ($faker) {
            return $faker->randomElement([\Carbon\Carbon::now(), null]);
        },
    ];
});
