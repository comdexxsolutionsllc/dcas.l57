<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Technician::class, function (Faker $faker) {
    return [
        'user_id'       => function () {
            return factory(App\Models\Roles\Customer::class)->create()->id;
        },
        'department_id' => function () {
            return factory(App\Models\Support\Department::class)->create()->id;
        },
    ];
});
