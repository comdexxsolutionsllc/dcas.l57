<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\AssetRegion::class, function (Faker $faker) {
    return [
        'name'       => $faker->word,
        'identifier' => $faker->uuid,
        'endpoint'   => $faker->url,
        'protocol'   => $faker->randomElement(['http', 'https']),
    ];
});
