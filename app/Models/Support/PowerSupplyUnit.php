<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support\PowerSupplyUnit
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\PowerSupplyUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\PowerSupplyUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\PowerSupplyUnit query()
 * @mixin \Eloquent
 */
class PowerSupplyUnit extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'vendor',
        'active',
    ];
}
