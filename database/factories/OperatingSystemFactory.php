<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\OperatingSystem::class, function (Faker $faker) {
    return [
        'architecture' => $faker->randomElement([
            'x86',
            'x64',
        ]),
        'type'         => $faker->randomElement([
            'UNIX',
            'BSD',
            'Linux',
            'Microsoft Windows',
        ]),
        'name'         => $faker->linuxPlatformToken,
        'notes'        => $faker->sentences(5, true),
        'active'       => $faker->boolean,
    ];
});
