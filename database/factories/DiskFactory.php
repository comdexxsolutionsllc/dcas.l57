<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Disk::class, function (Faker $faker) {
    return [
        'vendor'      => $faker->text,
        'series'      => $faker->text,
        'model'       => $faker->text,
        'interface'   => $faker->text,
        'capacity'    => $faker->text,
        'seed'        => $faker->text,
        'cache'       => $faker->text,
        'latency'     => $faker->text,
        'form_factor' => $faker->text,
    ];
});
