<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Roles\Customer::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'account_id'        => \App\General\AccountId::generate(),
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Models\Roles\Employee::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'employee_id'       => \App\General\EmployeeId::generate(),
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Models\Roles\Vendor::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'account_id'        => \App\General\AccountId::generate('V'),
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Models\Roles\Whiteglove::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'account_id'        => \App\General\AccountId::generate('WG'),
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => str_random(10),
    ];
});

$factory->state(App\Models\Roles\Employee::class, 'administrator', function ($faker) {
    return [
        'name'           => 'Alex R.',
        'email'          => 'alex@elementalfusion.online',
        'remember_token' => null,
    ];
});
