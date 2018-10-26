<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\AvailabilityZone::class, function (Faker $faker) {
    return [
        'region_ids' => function () {
            return factory(App\Models\Support\AssetRegion::class, 10)->create()->pluck('id')->toJson();
        },
        'comments'   => $faker->randomElement([null, $faker->sentence()]),
    ];
});
