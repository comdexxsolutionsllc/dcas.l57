<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\Memory
 *
 * @property int                                                                             $id
 * @property string                                                                          $vendor
 * @property string                                                                          $model
 * @property string                                                                          $capacity
 * @property string                                                                          $type
 * @property string                                                                          $speed
 * @property int                                                                             $ecc
 * @property int                                                                             $buffered
 * @property int                                                                             $registered
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereBuffered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereEcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereRegistered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Memory whereVendor($value)
 * @mixin \Eloquent
 */
class Memory extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'vendor',
        'model',
        'capacity',
        'type',
        'speed',
        'ecc',
        'buffered',
        'registered',
    ];

    /**
     * @var string
     */
    protected $table = 'memory';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'memory_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
