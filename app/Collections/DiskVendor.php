<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class DiskVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'ADATA',
        'Apacer',
        'ASUS "Rog Raidr"',
        'ATP Electronics',
        'Corsair Memory',
        'Crucial (flash chips made by Micron)',
        'Fujitsu',
        'Fusion-io brand',
        'Goodram',
        'Greenliant Systems',
        'G.Skill',
        'Hitachi Global Storage Technologies (enterprise grade)',
        'Huawei (Enterprise grade)',
        'IBM (Enterprise grade)',
        'Intel',
        'Kingston Technology',
        'Lexar',
        'Memoright',
        'Mushkin',
        'OCZ brand',
        'PNY Technologies',
        'Ritek/RiDATA',
        'RunCore',
        'Samsung Electronics (NAND Mfgr[2])',
        'SanDisk acquired in 2016',
        'Seagate Technology',
        'STEC, Inc. brand',
        'Strontium Technology',
        'SuperTalent',
        'Texas Memory Systems',
        'Toshiba (NAND Mfgr[2])',
        'Transcend',
        'Verbatim',
        'Viking Modular Solutions',
        'Western Digital',
        'Zalman',
        'Zotac "SONIX"',
    ];

    /**
     * DiskVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
