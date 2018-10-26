<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Status::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'description' => $faker->sentence,
        'hexcode'     => $faker->safeHexColor,
        'visible'     => $faker->boolean,
    ];
});
