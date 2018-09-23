<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Note::class, function (Faker $faker) {
    $types = $faker->randomElement([
        App\Models\Support\Technician::class,
        App\Models\Support\Ticket::class,
        App\Models\Roles\Customer::class,
    ]);

    return [
        'body'          => $faker->paragraph,
        'noteable_id'   => $faker->randomElement($types::pluck('id')->toArray()),
        'noteable_type' => $types,
    ];
});
