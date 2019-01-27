<?php

use Faker\Generator as Faker;

// @todo
$factory->define(App\Models\General\InboundEmail::class, function (Faker $faker) {
    return [
        'body_plain'         => $faker->paragraph(4),
        'date'               => $faker->dateTime,
        'domain'             => $faker->domainName,
        'from'               => $sender = $faker->companyEmail,
        'from_full'          => $faker->name . " <{$sender}>",
        'message_headers'    => null,
        'message_id'         => function () use ($faker) {
            $default_length = 38;
            $chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9), ['-', '.']);
            $messageId = '';

            for ($i = 0; $i <= $default_length; $i ++) {
                shuffle($chars);

                $index = array_rand($chars);

                $messageId .= $chars[$index];
            }

            $messageId .= "@{$faker->domainName}";

            return $messageId;
        },
        'message_url'        => $faker->url,
        'recipient'          => $faker->unique()->companyEmail,
        'sender'             => $sender,
        'stripped_html'      => [],
        'stripped_signature' => [],
        'stripped_text'      => [],
        'subject'            => $faker->sentence,
        'response_timestamp' => $faker->dateTime,
        'token'              => null,
    ];
});

//$table->longText('body_plain');
//$table->timestamp('date');
//$table->string('domain');
//$table->string('from');
//$table->string('from_full');
//$table->longText('message_headers');
//$table->string('message_id', 512)->unique();
//$table->text('message_url');
//$table->string('recipient');
//$table->string('sender');
//$table->longText('stripped_html');
//$table->longText('stripped_signature')->nullable();
//$table->longText('stripped_text');
//$table->string('subject');
//$table->timestamp('response_timestamp')->default(now());
//$table->string('token', 255)->unique();
