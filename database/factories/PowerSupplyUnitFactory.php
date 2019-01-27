<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\PowerSupplyUnit::class, function (Faker $faker) {
    return [
        'vendor' => $faker->word,
        'active' => $faker->boolean,
    ];
});
