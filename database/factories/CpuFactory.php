<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Cpu::class, function (Faker $faker) {
    return [
        'architecture'    => $faker->randomElement(['x86', 'x64']),
        'vendor'          => $faker->word,
        'family'          => $faker->word,
        'model'           => $faker->word,
        'speed'           => $faker->word,
        'cache_size'      => $faker->word,
        'number_of_cores' => $faker->randomNumber(2),
    ];
});
