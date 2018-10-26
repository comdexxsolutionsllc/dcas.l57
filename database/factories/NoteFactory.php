<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Note::class, function (Faker $faker) {
    $types = $faker->randomElement([
        (new App\Models\Roles\Customer),
        (new App\Models\Support\Ticket),
    ]);

    return [
        'body'          => $faker->paragraph,
        'noteable_id'   => function () use ($faker, $types) {
            //  $faker->randomElement(App\Models\Support\Technician::pluck('employee_id')->toArray()) ||
            return $faker->randomElement($types::pluck('id')->toArray());
        },
        'noteable_type' => get_class($types),
    ];
});
