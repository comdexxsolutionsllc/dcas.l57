<?php

namespace App\General;

/**
 * Class TransactionId
 *
 * @package App\General
 */
class TransactionId
{

    /**
     * Generate a transaction identification number.
     *
     * @return string
     */
    public static function generate(): string
    {
        $chars = array_merge(range(0, 9), range('a', 'f'));

        $transactionId = 'TX';

        $length = 64;

        for ($count = 0; $count < $length; $count ++) {
            $transactionId .= strtoupper($chars[rand(0, count($chars) - 1)]);
        }

        return $transactionId;
    }
}
