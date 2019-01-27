<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class ChassisVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'AkiTiO',
        'Antec',
        'Ark Technology Inc.',
        'Aruba Networks, Inc',
        'Athena Power',
        'Brocade',
        'Celestica',
        'Chenbro Micom',
        'Chief',
        'Cisco Systems, Inc.',
        'Compal Electronics',
        'Compucase',
        'CRU-DataPort',
        'Deejay LED',
        'Dell',
        'e.mini',
        'Enlight',
        'ETopSell',
        'Foxconn',
        'Gator Cases',
        'Gray Matter Industries',
        'HIKVISION',
        'Hon Hai',
        'HP',
        'HPE',
        'IBM',
        'Intel',
        'Inventec',
        'In Win',
        'I-Star USA Inc',
        'j5create',
        'Juniper Networks, Inc.',
        'Lenovo',
        'LESHP',
        'Linksys',
        'MA Labs',
        'MiTAC',
        'Nanoxia',
        'Nanya',
        'NMEDIAPC',
        'Norco Technologies Inc.',
        'ODM',
        'Odyssey Innovative Designs',
        'Other World Computing',
        'Pegatron',
        'Quanta',
        'Raising Electronics, Inc',
        'Rosewill',
        'Sanho Corporation',
        'SIIG, Inc',
        'SKB',
        'Sonnet Technologies',
        'Super Micro Computer',
        'TOPOWER',
        'Transition Networks',
        'TRENDnet',
        'Tripp Lite',
        'VVTS',
        'Will Jaya',
        'Wistron',
        'ZT Systems',
    ];

    /**
     * ChassisVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
