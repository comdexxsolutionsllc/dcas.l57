<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\Ticket::class, function (Faker $faker) {
    return [
        'ticket_id'              => \App\General\TicketId::generate(),
        'title'                  => $faker->sentence,
        'body'                   => $faker->paragraph,
        'status_id'              => factory(App\Models\Support\Status::class),
        'department_id'          => factory(App\Models\Support\Department::class),
        'technician_assigned_id' => function () {
            return factory(App\Models\Support\Technician::class)->create()->employee_id;
        },
        'is_resolved'            => $faker->boolean,
        'ticketable_type'        => $ticketableType = $faker->randomElement([
            'App\Models\Roles\Customer',
            'App\Models\Roles\Employee',
            'App\Models\Roles\Vendor',
            'App\Models\Roles\Whiteglove',
        ]),
        'ticketable_id'          => function () use ($faker, $ticketableType) {
            return $faker->randomElement(range(1, (new $ticketableType)->count()));
        },
    ];
});
