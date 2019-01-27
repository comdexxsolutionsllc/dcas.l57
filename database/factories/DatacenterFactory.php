<?php

use Faker\Generator as Faker;

$airportCodes = [];

foreach ($airports = json_decode(\File::get(database_path('schema/airports.json')), true) as $index => $airport) {
    array_push($airportCodes, $airport['code']);
}

$factory->define(App\Models\Support\Datacenter::class, function (Faker $faker) use ($airportCodes) {
    return [
        'code'         => $faker->randomElement($airportCodes),
        'location'     => $faker->city,
        'status'       => $faker->randomElement([0, 1]),
        'opening_date' => \Carbon\Carbon::now(),
    ];
});
