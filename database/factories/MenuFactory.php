clear<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Website\Menu::class, function (Faker $faker) {
    return [
        'text'   => $faker->sentence,
        'url'    => $faker->imageUrl(),
        'target' => function () use ($faker) {
            return $faker->randomElement([
                null,
                '_blank',
                '_self',
                '_parent',
                '_top',
            ]);
        },
        'icon'   => function () use ($faker) {
            return $faker->randomElement([
                null,
                'address-card-o',
                'angle-left',
                'archive',
                'asterisk',
                'backward',
                'bank',
                'bars',
                'area-chart',
                'arrows',
                'amazon',
            ]);
        },
    ];
});
