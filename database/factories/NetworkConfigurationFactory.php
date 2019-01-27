<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\NetworkConfiguration::class, function (Faker $faker) {
    return [
        'switchport_information_id' => $faker->randomElement(\App\Models\Support\SwitchportInformation::pluck('id')->all()),
        'configuration'             => $faker->sentences(5, true),
    ];
});
