<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Chassis::class, function (Faker $faker) {
    return [
        'asset_owner'                => factory(App\Models\General\Asset::class),
        'accountable_id'             => function () {
            return \App\Models\Roles\Customer::inRandomOrder()->first()->id;
        },
        'accountable_type'           => 'App\Models\Roles\Customer',
        'vendor'                     => $faker->company,
        'model'                      => $faker->word,
        'serial_number'              => $faker->uuid,
        'form_factor_in_u'           => $faker->randomElement(range(0.5, 6.0)),
        'chassis_type'               => $faker->randomElement(['rackmount', 'tower']),
        'power_supply'               => $faker->word,
        'hot_swap_drive_bays'        => $faker->randomNumber(1),
        'internal_drive_bays'        => $faker->randomNumber(1),
        'expansion_slots'            => $faker->randomNumber(1),
        'expansion_slot_information' => $faker->sentence(),
    ];
});
