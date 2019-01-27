<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\SecurityGroup::class, function (Faker $faker) {
    return [
        'security_group_serial' => $faker->uuid,
        'source'                => $faker->word,
        'direction'             => $faker->randomElement(['inbound', 'outbound']),
        'protocol'              => 'tcp',
        'port_range'            => $faker->randomNumber(4),
        'comments'              => null,
    ];
});
