<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Comment::class, function (Faker $faker) {
    $types = $faker->randomElement([
        App\Models\Support\Ticket::class,
    ]);

    return [
        'body'             => $faker->paragraph,
        'commentable_id'   => $faker->randomElement($types::pluck('id')->toArray()),
        'commentable_type' => $types,
    ];
});
