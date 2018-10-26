<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class NicVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        '4ipnet',
        'Aerohive',
        'Air802',
        'AirTight',
        'Allied Telesis',
        'Altai Technologies',
        'Alvarion',
        'Asus',
        'Avaya',
        'Belkin',
        'Billion Electric',
        'Broadcom',
        'CHANGE Networks',
        'Cambium Networks',
        'Ceragon',
        'Cerio',
        'Cisco',
        'Compex Systems',
        'Cradlepoint',
        'D-Link',
        'Edgewater Wireless',
        'Emulex',
        'EnGenius',
        'Ericsson',
        'Extreme Networks',
        'Fortinet',
        'HPE',
        'Intel',
        'LANCOM Systems',
        'Linksys',
        'Marvell',
        'Mellanox',
        'MikroTik',
        'Motorola',
        'NEC',
        'NETGEAR',
        'Nokia Networks',
        'Oracle Corporation',
        'Proxim',
        'QLogic',
        'RF Elements',
        'Realtek',
        'Redline Telecommunications',
        'Ruckus',
        'SMC',
        'Samsung',
        'Sierra Wireless',
        'Silicom Connectivity Solutions',
        'TP-Link',
        'Ubiquiti',
        'Xirrus',
        'Zcomax Technologies',
        'ZyXEL',
    ];

    /**
     * NicVendors constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
