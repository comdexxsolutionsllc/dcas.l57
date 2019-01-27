<?php

use Faker\Generator as Faker;

//$table->string('type');
//$table->morphs('notifiable');
//$table->text('data');
//$table->timestamp('read_at')->nullable();

$factory->define(App\Models\General\Notification::class, function (Faker $faker) {
    return [
        'type'            => null,
        'notifiable_type' => null,
        'notifiable_id'   => null,
        'data'            => null,
        'read_at'         => null,
    ];
});
