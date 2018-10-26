<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\MotherboardType::class, function (Faker $faker) {
    return [
        'vendor'                    => $faker->word,
        'model'                     => $faker->word,
        'form_factor'               => $faker->randomElement([
            'AT',
            'Baby AT',
            'ATX',
            'Mini ATX',
            'Micro ATX',
            'Flex ATX',
            'LPX',
            'Mini LPX',
            'NLX',
        ]),
        'assigned_chassis'          => factory(\App\Models\Support\Chassis::class),
        'assigned_hdds'             => [],
        'assigned_memory'           => [],
        'assigned_networking_cards' => [],
        'assigned_raid_cards'       => [],
        'bios_features'             => $faker->word,
        'chipset'                   => $faker->word,
        'expansion_slots'           => $faker->word,
        'front_side_bus'            => $faker->word,
        'hdd_connection_type'       => $faker->randomElement([
                'SCSI',
                'SATA',
                'SAS',
            ]),
        'processor_information'     => [],
    ];
});
