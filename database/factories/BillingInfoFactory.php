<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\BillingInfo::class, function (Faker $faker) {
    return [
        'first_name'   => $faker->firstName,
        'last_name'    => $faker->lastName,
        'company'      => $faker->randomElement([null, $faker->company]),
        'address_1'    => $faker->streetAddress,
        'address_2'    => null,
        'city'         => $faker->city,
        'state'        => 'IL',
        'postal_code'  => $faker->postcode,
        'country'      => $faker->country,
        'phone_number' => $faker->phoneNumber,
        'phone_type'   => function () use ($faker) {
            return $faker->randomElement([
                'home',
                'mobile',
                'office',
                'work',
                'other',
            ]);
        },
    ];
});
