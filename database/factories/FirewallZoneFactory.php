<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\FirewallZone::class, function (Faker $faker) {
    return [
        'network_asset_number' => $faker->word,
        'datacenter_id'        => factory(\App\Models\Support\Datacenter::class),
        'network_device_id'    => factory(\App\Models\Support\NetworkDevice::class),
        'available'            => $faker->timezone,
    ];
});
