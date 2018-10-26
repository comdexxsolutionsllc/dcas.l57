<?php

namespace App\Models\General;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\General\Registrar
 *
 * @property int                                                                             $id
 * @property string                                                                          $name
 * @property string                                                                          $url
 * @property string                                                                          $type
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Domain[]      $domains
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Registrar whereUrl($value)
 * @mixin \Eloquent
 */
class Registrar extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'registrar_index';
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
