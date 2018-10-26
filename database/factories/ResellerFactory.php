<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\Reseller::class, function (Faker $faker) {
    return [
        'account_id'  => \App\General\AccountId::generate(),
        'company_id'  => $faker->randomElement(\App\Models\General\Company::pluck('id')->all()),
        'expiry_date' => \Carbon\Carbon::now()->addDays(180),
        'salesrep_id' => $faker->randomElement(\App\Models\Support\SalesRep::pluck('id')->all()),
    ];
});
