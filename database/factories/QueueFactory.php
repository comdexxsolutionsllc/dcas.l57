<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Queue::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'description' => $faker->sentence,
        'visible'     => $faker->boolean,
    ];
});
