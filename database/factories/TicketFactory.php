<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Ticket::class, function (Faker $faker) {
    return [
        'ticket_id'              => \App\General\TicketId::generate(),
        'title'                  => $faker->sentence,
        'body'                   => $faker->paragraph,
        'status_id'              => function () {
            return factory(App\Models\Support\Status::class)->create()->id;
        },
        'department_id'          => function () {
            return factory(App\Models\Support\Department::class)->create()->id;
        },
        'user_id'                => function () use ($faker) {
            return $faker->randomElement(App\Models\Roles\Customer::pluck('id')->toArray());
        },
        'technician_assigned_id' => function () {
            return factory(App\Models\Support\Technician::class)->create()->id;
        },
    ];
});
