<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\SubnetAddress::class, function (Faker $faker) {
    return [
        'subnet_address' => $faker->ipv4,
        'network_block'  => $faker->ipv4,
        //'network_mask' => factory(),
        'datacenter_id'  => factory(\App\Models\Support\Datacenter::class),
        'available'      => $faker->dateTime,
    ];
});
