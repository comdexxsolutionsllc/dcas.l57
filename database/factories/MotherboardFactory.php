<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Motherboard::class, function (Faker $faker) {
    return [
        'vendor'                   => $faker->word,
        'model'                    => $faker->word,
        'cpu_id'                   => factory(\App\Models\Support\Cpu::class),
        'chipset'                  => $faker->word,
        'socket_type'              => $faker->word,
        'form_factor'              => $faker->word,
        'dvi'                      => $faker->word,
        'hdmi'                     => $faker->word,
        'display_port'             => $faker->word,
        'bios'                     => $faker->word,
        'graphics'                 => $faker->word,
        'audio'                    => $faker->word,
        'audio_chipset'            => $faker->word,
        'lan'                      => $faker->word,
        'max_lan_speed'            => $faker->randomNumber(2),
        'memory_slots'             => $faker->randomNumber(1),
        'maximum_memory_supported' => $faker->randomNumber(4),
        'channels_supported'       => [],
        'storage'                  => [],
        'connectors'               => [],
        'supported_oses'           => [],
        'notes'                    => null,
        'eol_announced'            => $faker->boolean,
        'ipmi_enabled'             => $faker->boolean,
    ];
});
