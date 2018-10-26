<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\ResourceGroup
 *
 * @property int                                                                             $id
 * @property string                                                                          $serial_number
 * @property mixed                                                                           $service_ids
 * @property string|null                                                                     $notes
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup whereServiceIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResourceGroup extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'serial_number',
        'service_ids',
        'notes',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'resource_group_index';
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
