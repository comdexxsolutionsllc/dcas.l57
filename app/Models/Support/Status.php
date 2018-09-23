<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support\Status
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $hexcode
 * @property int $visible
 * @property bool|\DateTime $deleted_at
 * @property bool|\DateTime $created_at
 * @property bool|\DateTime $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereHexcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Status whereVisible($value)
 * @mixin \Eloquent
 */
class Status extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get deleted_at in array format
     *
     * @param  string $value
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
     * @param  string $value
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
     * @param  string $value
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
        return 'statuses_index';
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
