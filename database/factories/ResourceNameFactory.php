<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\ResourceName::class, function (Faker $faker) {
    return [
        'partition'            => $faker->word,
        'service_namespace_id' => factory(\App\Models\Support\ServiceNamespace::class),
        'service_region_id'    => factory(\App\Models\Support\AssetRegion::class),
        'accountable_id'       => 1,
        'accountable_type'     => 'App\Models\Roles\Customer',
    ];
});
