<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class PowerSupplyUnit extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'AcBel',
        'Adata',
        'Akasa',
        'Antec',
        'APEVIA',
        'Arctic',
        'Be quiet!',
        'BFG Technologies',
        'Channel Well Technology (CWT)',
        'Cooler Master',
        'Corsair',
        'Cougar',
        'Deepcool',
        'Delta Electronics',
        'Dynex',
        'Enermax',
        'EVGA Corporation',
        'Fractal Design',
        'Foxconn',
        'FSP Group',
        'Gigabyte Technology',
        'Great Wall',
        'Huntkey',
        'Lian-Li',
        'LiteOn',
        'Maplin',
        'Mean Well',
        'NZXT',
        'OCZ Technology',
        'PC Power and Cooling',
        'RAIDMax',
        'Seasonic',
        'Seventeam',
        'SilverStone',
        'StarTech.com',
        'Super Flower',
        'Riotoro',
        'Thermaltake',
        'Trust',
        'XFX',
        'Xilence',
        'Zalman',
    ];

    /**
     * PowerSupplyUnit constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
