<?php

namespace App\General;

/**
 * Class AccountId
 *
 * @package App\General
 */
class AccountId
{

    const LOWER_BOUNDS = 4;

    /**
     * @var array
     */
    static $accountTypes = [
        'C',
        'V',
        'WG',
    ];

    /**
     * @var string
     */
    static $accountTypeDefault = 'C';

    /**
     * Generate an account number.
     *
     * @param null $type
     * @param int  $length
     *
     * @return string
     */
    public static function generate($type = null, int $length = 5): string
    {
        if ($length <= self::LOWER_BOUNDS) {
            return new \OutOfBoundsException('Account ID length must be greater than ' . self::LOWER_BOUNDS . '.');
        }

        $chars = array_merge(range(0, 9));

        $accountId = in_array($type, static::$accountTypes) ? $type : static::$accountTypeDefault;

        for ($count = 0; $count < $length; $count ++) {
            $accountId .= strtoupper($chars[rand(0, count($chars) - 1)]);
        }

        return $accountId;
    }
}
