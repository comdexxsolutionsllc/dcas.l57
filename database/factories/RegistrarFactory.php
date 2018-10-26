<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\Registrar::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'url'  => $faker->url,
        'type' => $faker->word,
    ];
});
