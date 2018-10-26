<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class NetworkDeviceType extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'Bridge',
        'Gateway',
        'Hub',
        'Load Balancer',
        'Modem',
        'NIC',
        'Repeater',
        'Router',
        'Switch',
    ];

    /**
     * NetworkDeviceType constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
