<?php

namespace App\Types;

/**
 * Class Customer
 *
 * @package App\Types
 */
abstract class Customer extends \Zlikavac32\Enum\Enum
{

    /**
     * @var string
     */
    private $symbol;

    /**
     * Customer constructor.
     *
     * @param string $symbol
     */
    public function __construct(string $symbol)
    {
        parent::__construct();

        $this->symbol = $symbol;
    }

    /**
     * @return array
     * @todo
     */
    protected static function enumerate(): array
    {
        return [

            'NO_ACCESS_DISABLED' => new class('NOAD') extends Customer
            {

            },
            'DEMO_GUEST'         => new class('DEMG') extends Customer
            {

            },
            'EMAIL_USER'         => new class('EMAU') extends Customer
            {

            },
            'PHONE_USER'         => new class('PHOU') extends Customer
            {

            },
            'BILLING_USER'       => new class('BILU') extends Customer
            {

            },
            'PORTAL_USER'        => new class('PORU') extends Customer
            {

            },
            'API_READ_USER'      => new class('APRU') extends Customer
            {

            },
            'API_USER'           => new class('APIU') extends Customer
            {

            },
            'ALL_ACCESS_USER'    => new class('ALAU') extends Customer
            {

            },
        ];
    }

    /**
     * @return string
     */
    public function symbol(): string
    {
        return $this->symbol;
    }
}
