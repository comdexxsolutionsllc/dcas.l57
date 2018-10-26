<?php

namespace App\Models\Support;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Support\Department
 *
 * @property int                                                                             $id
 * @property string                                                                          $name
 * @property string|null                                                                     $description
 * @property string                                                                          $hexcode
 * @property int                                                                             $visible
 * @property bool|\DateTime                                                                  $deleted_at
 * @property bool|\DateTime                                                                  $created_at
 * @property bool|\DateTime                                                                  $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Support\Ticket[]      $tickets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereHexcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Department whereVisible($value)
 * @mixin \Eloquent
 */
class Department extends BaseModel
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'hexcode',
        'visible',
    ];

    /**
     * Get deleted_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getDeletedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get created_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get updated_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'departments_index';
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
