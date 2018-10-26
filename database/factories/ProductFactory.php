<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\General\Product::class, function (Faker $faker) {
    return [
        'qty'         => $faker->numberBetween(1, 48),
        'name'        => $faker->words(5, true),
        'description' => $faker->sentence,
        'taxable'     => $faker->boolean,
        'lineItem'    => $faker->boolean,
        'price'       => $faker->randomFloat(2, 19.99, 999.99),
    ];
});
