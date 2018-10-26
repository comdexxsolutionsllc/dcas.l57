<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nameserver\Tsigkey::class, function (Faker $faker) {
    return [
        'name'      => $faker->word,
        'algorithm' => $faker->randomElement([
            'dsa',
            'rsa',
        ]),
        'secret'    => str_random(128),
    ];
});
