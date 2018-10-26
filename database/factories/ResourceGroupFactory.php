<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\ResourceGroup::class, function (Faker $faker) {
    return [
        'serial_number' => $faker->uuid,
        'service_ids'   => [],
        'notes'         => null,
    ];
});
