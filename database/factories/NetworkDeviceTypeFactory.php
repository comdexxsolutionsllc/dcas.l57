<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\NetworkDeviceType::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'description' => $faker->sentence,
        'active'      => $faker->boolean,
    ];
});
