<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nameserver\Comment::class, function (Faker $faker) {
    return [
        'domain_id'   => $faker->randomFloat(\App\Models\Nameserver\Domain::pluck('id')->all()),
        'name'        => $faker->word,
        'type'        => $faker->word,
        'modified_at' => $faker->unixTime,
        'account'     => $faker->word,
        'comment'     => $faker->sentence,
    ];
});
