<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class MemoryVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'ADATA',
        'Apacer',
        'Asus',
        'Axiom',
        'Buffalo Technology',
        'Chaintech',
        'Corsair Memory',
        'Crucial',
        'Dataram',
        'Fujitsu',
        'GeIL',
        'G.Skill',
        'HyperX',
        'IBM',
        'Infineon',
        'Kingston Technology',
        'Lenovo',
        'Micron Technology',
        'Mushkin',
        'Nanya',
        'PNY',
        'Rambus',
        'Ramtron International',
        'Rendition',
        'Renesas Technology',
        'Samsung Semiconductor',
        'Sandisk',
        'Sea Sonic',
        'Silicon Power',
        'SK Hynix',
        'Super Talent',
        'Toshiba',
        'Transcend',
        'Wilk Elektronik',
        'Winbond',
        'Wintec Industries Inc.',
    ];

    /**
     * MemoryVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
