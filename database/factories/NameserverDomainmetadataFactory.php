<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nameserver\Domainmetadata::class, function (Faker $faker) {
    return [
        'domain_id' => $faker->randomElement(\App\Models\Nameserver\Domain::pluck('id')->all()),
        'kind'      => null,
        'content'   => null,
    ];
});
