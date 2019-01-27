<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nameserver\Record::class, function (Faker $faker) {
    return [
        'domain_id'   => $faker->randomElement(\App\Models\Nameserver\Domain::pluck('id')->all()),
        'name'        => $faker->words(5, true),
        'type'        => $faker->word,
        'content'     => $faker->sentences(5, true),
        'ttl'         => $faker->randomNumber(),
        'priority'    => $faker->randomElement(range(0, 10)),
        'change_date' => $faker->unixTime,
        'disabled'    => $faker->randomElement([0, 1]),
        'ordername'   => 1,
        'auth'        => $faker->randomElement([0, 1]),
    ];
});
