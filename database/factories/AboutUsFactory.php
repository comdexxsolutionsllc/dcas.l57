<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Website\AboutUs::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'portrait'    => $faker->imageUrl(),
        'job_title'   => $faker->jobTitle,
        'job_summary' => $faker->paragraph,
    ];
});
