<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nameserver\Supermaster::class, function (Faker $faker) {
    return [
        'ip'         => $faker->ipv4,
        'nameserver' => $faker->domainName,
        'account'    => $faker->userName,
    ];
});
