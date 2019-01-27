<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nameserver\Cryptokey::class, function (Faker $faker) {
    return [
        'domain_id' => $faker->randomNumber(\App\Models\Nameserver\Domain::pluck('id')->all()),
        'flags'     => $faker->randomNumber(1),
        'active'    => $faker->boolean,
        'content'   => str_random(1024),
    ];
});
