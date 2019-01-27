<?php

namespace App\General;

use Illuminate\Support\Collection;

/**
 * Class EmailParser
 *
 * @package App\General
 */
class EmailParser
{

    /**
     * Keys to keep from email response.
     *
     * @var array
     */
    public static $keep = [
        'Date',
        'From',
        'Message-Id',
        'body-plain',
        'domain',
        'from',
        'message-headers',
        'message-url',
        'recipient',
        'sender',
        'stripped-html',
        'stripped-signature',
        'stripped-text',
        'subject',
        'timestamp',
        'token',
    ];

    /**
     * Parsed email.
     *
     * @var array $email
     */
    protected static $email;

    /**
     * @param $response
     *
     * @return array
     */
    public static function parse($response): array
    {
        return static::$email = (new Collection($response))->only(static::$keep)->toArray();
    }
}
