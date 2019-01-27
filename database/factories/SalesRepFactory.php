<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\SalesRep::class, function (Faker $faker) {
    return [
        'employee_id' => $faker->randomElement(\App\Models\Roles\Employee::pluck('id')->all()),
        'company_id'  => $faker->randomElement(\App\Models\General\Company::pluck('id')->all()),
    ];
});
