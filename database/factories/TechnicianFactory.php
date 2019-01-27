<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Technician::class, function (Faker $faker) {
    return [
        'employee_id'   => function () use ($faker) {
            if (\App\Models\Roles\Employee::count()) {
                return $faker->randomElement(App\Models\Roles\Employee::all()->toArray())['id'];
            }

            return factory(App\Models\Roles\Employee::class)->create()->id;
        },
        'department_id' => function () use ($faker) {
            if (\App\Models\Roles\Employee::count()) {
                return $faker->randomElement(App\Models\Support\Department::all()->toArray())['id'];
            }

            return factory(App\Models\Support\Department::class)->create()->id;
        },
    ];
});
