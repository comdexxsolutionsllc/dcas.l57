<?php

use Faker\Generator as Faker;

$factory->define(App\Models\General\InvoiceItem::class, function (Faker $faker) {
    return [
        'invoice_id'  => $faker->randomElement(\App\Models\General\Invoice::pluck('id')->all()),
        'service_id'  => $faker->randomElement(\App\Models\General\Service::pluck('id')->all()),
        'description' => $faker->sentence,
        'price'       => $faker->randomFloat(2, 2, 2),
    ];
});
