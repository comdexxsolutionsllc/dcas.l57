<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\ServiceLimit::class, function (Faker $faker) {
    return [
        'resource_operation_name' => $faker->word,
        'default_limit'           => $faker->randomNumber(1),
        'min_limit'               => $faker->randomNumber(1),
        'max_limit'               => $faker->randomNumber(3),
        'burst_capacity'          => $faker->randomNumber(3),
        'is_calls_per_second'     => $faker->boolean,
        'is_adjustable'           => $faker->boolean,
        'comments'                => null,
    ];
});
