<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\ServiceNamespace::class, function (Faker $faker) {
    return [
        'services_id' => factory(\App\Models\General\Service::class),
        'namespace'   => $faker->word,
    ];
});
