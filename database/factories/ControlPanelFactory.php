<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\ControlPanel::class, function (Faker $faker) {
    return [
        'control_panel'    => $faker->word,
        'free'             => $faker->boolean,
        'frontend'         => $faker->word,
        'backend'          => $faker->word,
        'databases'        => $faker->word,
        'dns'              => $faker->word,
        'ftp'              => $faker->word,
        'email'            => $faker->word,
        'multi_server'     => $faker->boolean,
        'operating_system' => $faker->randomElement(['linux', 'windows']),
        'ipv6_enabled'     => $faker->boolean,
    ];
});
