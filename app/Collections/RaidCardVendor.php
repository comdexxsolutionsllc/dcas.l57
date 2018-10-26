<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class RaidCardVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        '3ware',
        'Adaptec',
        'Asus',
        'ATTO Technology',
        'Dell',
        'Intel',
        'LG',
        'LSI',
        'PNY',
        'Promise Technology',
        'StarTech.com',
    ];

    /**
     * RaidCardVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
