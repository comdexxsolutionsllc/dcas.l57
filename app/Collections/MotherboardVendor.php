<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class MotherboardVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'Acer',
        'ACube Systems',
        'AMAX Information Technologies',
        'AOpen',
        'ASRock',
        'Asus',
        'Biostar',
        'Chassis Plans',
        'DFI',
        'ECS (Elitegroup Computer Systems)',
        'EPoX',
        'EVGA Corporation',
        'First International Computer',
        'Foxconn',
        'Fujitsu[1]',
        'Gigabyte Technology',
        'Gumstix',
        'iBase',
        'Lanner Inc',
        'Leadtek',
        'LiteOn',
        'Magic-Pro',
        'MSI (Micro-Star International)',
        'NZXT',
        'PNY Technologies',
        'Powercolor',
        'Sapphire Technology',
        'Shuttle Inc.',
        'Simmtronics',
        'Supermicro',
        'Trenton Technology',
        'Tyan',
        'VIA Technologies',
        'Vigor Gaming',
        'XFX',
    ];

    /**
     * MotherboardVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
