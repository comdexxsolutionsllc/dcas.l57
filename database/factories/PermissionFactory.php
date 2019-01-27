<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\Permission::class, function (Faker $faker) {
    return [
        'name'       => $faker->word,
        'guard_name' => 'web',
    ];
});
