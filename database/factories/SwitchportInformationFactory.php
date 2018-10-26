<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\SwitchportInformation::class, function (Faker $faker) {
    return [
        'network_device_id' => $faker->randomElement(\App\Models\Support\NetworkDevice::pluck('id')->all()),
        'switchport_number' => 5,
        'category'          => $faker->randomElement([
            'managed',
            'hybrid/smart',
            'unmanaged',
        ]),
        'port_speed'        => $faker->randomElement([
            10,
            100,
            1000,
            10000,
            40000,
            100000,
        ]),
        'connection_type'   => $faker->randomElement([
            'ethernet/cat-5e',
            'ethernet/cat-6',
            'ethernet/cat-6a',
            'ethernet/cat-7',
            'fiber-channel/infiniband',
            'fiber-channel/osfp',
            'fiber-channel/sfp+',
            'fiber-channel/10g-cx4',
            'fiber-channel/lc',
            'fiber-channel/sc',
            'fiber-channel/st',
            'fiber-optic/st',
            'fiber-optic/sc',
            'fiber-optic/fc',
            'fiber-optic/mt-rj',
            'fiber-optic/lc',
            'coaxial',
        ]),
        'poe_status'        => $faker->randomElement([
            'POE',
            'Non-POE',
        ]),
        'stackable_status'  => $faker->randomElement([
            'stackable',
            'standalone',
        ]),
        'duplex_type'       => $faker->randomElement([
            'simplex',
            'half-duplex',
            'full-duplex',
        ]),
    ];
});
