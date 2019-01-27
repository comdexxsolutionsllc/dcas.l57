<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\RaidCard::class, function (Faker $faker) {
    return [
        'vendor'                      => $faker->word,
        'model'                       => $faker->word,
        'launch_date'                 => $faker->dateTime,
        'expected_discontinuance'     => $faker->randomElement([null, $faker->dateTime]),
        'data_transfer_rate'          => $faker->randomNumber(4),
        'supported_devices'           => [],
        'supported_raid_levels'       => [],
        'jbod_mode'                   => $faker->boolean,
        'number_of_internal_ports'    => $faker->randomNumber(1),
        'number_of_supported_devices' => $faker->randomNumber(2),
        'embedded_memory'             => $faker->randomNumber(4),
        'supported_oses'              => [],
    ];
});
