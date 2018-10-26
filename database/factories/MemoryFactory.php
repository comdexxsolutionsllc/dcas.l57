<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Memory::class, function (Faker $faker) {
    return [
        'vendor'     => $faker->word,
        'model'      => $faker->word,
        'capacity'   => $faker->word,
        'type'       => $faker->word,
        'speed'      => $faker->word,
        'ecc'        => $faker->boolean,
        'buffered'   => $faker->boolean,
        'registered' => $faker->boolean,
    ];
});
