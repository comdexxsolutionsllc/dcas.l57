<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\Company::class, function (Faker $faker) {
    return [
        'name'          => $faker->company,
        'contact_name'  => $faker->name,
        'contact_email' => $faker->companyEmail,
        'contact_phone' => $faker->phoneNumber,
        'phone_type'    => $faker->randomElement([
            'home',
            'mobile',
            'office',
            'work',
            'other',
        ]),
        'active'        => $faker->boolean,
    ];
});
