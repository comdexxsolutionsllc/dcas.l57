<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\NetworkDevice::class, function (Faker $faker) {
    return [
        'asset_number'           => \App\General\HardwareId::generate(),
        'serial_number'          => \App\General\DCASHelper::make_serial_number(),
        'network_device_type_id' => $faker->randomElement(\App\Models\Support\NetworkDeviceType::pluck('id')->all()),
        'hostname'               => $faker->domainName,
        'ip_address'             => $faker->ipv4,
        'ip_address_alt'         => $faker->randomElement([
            null,
            $faker->ipv4,
        ]),
        'hardware_maker'         => $faker->company,
        'hardware_version'       => '1.2.4',
        'device_os_version'      => $faker->linuxPlatformToken,
        'total_ports'            => $faker->randomElement([
            8,
            16,
            24,
            30,
            40,
            48,
            96,
            144,
        ]),
    ];
});
