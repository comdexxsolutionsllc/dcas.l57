<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class CpuVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'Acer',
        'AMD',
        'Atmel',
        'Cyrix',
        'Dell',
        'Freescale',
        'Global Foundries',
        'Hewlett-Packard (hp)',
        'IBM',
        'Intel',
        'Marvell',
        'Media Tek',
        'Motorola',
        'MSNCC-Microcell',
        'NVIDIA',
        'Qualcomm',
        'Rockchip',
        'Samsung',
        'Transmeta',
        'VIA',
    ];

    /**
     * CpuVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
