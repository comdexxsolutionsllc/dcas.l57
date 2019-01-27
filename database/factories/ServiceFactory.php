<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\Service::class, function (Faker $faker) {
    return [
        'account_type' => $account_type = "App\\Models\\Roles\\" . ucfirst($faker->randomElement(\App\General\DCASHelper::get_roles())),
        'account_id'   => function () use ($account_type, $faker) {
            return $faker->randomElement($account_type::pluck('id')->all());
        },
        'service_type' => $faker->word,
        'status'       => $faker->word,
        'last_payment' => \Carbon\Carbon::now()->subDays(rand(0, 365)),
        'last_invoice' => \Carbon\Carbon::now()->subDays(rand(0, 30)),
    ];
});
