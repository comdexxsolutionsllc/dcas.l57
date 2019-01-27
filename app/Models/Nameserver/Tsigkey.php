<?php

namespace App\Models\Nameserver;

use App\Models\BaseModel;

/**
 * App\Models\Nameserver\Tsigkey
 *
 * @property int    $id
 * @property string $name
 * @property string $algorithm
 * @property string $secret
 * @property array  $created_at
 * @property array  $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereAlgorithm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tsigkey extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_tsigkeys';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'algorithm',
        'secret',
    ];

    /**
     * Get created_at in array format
     *
     * @param string $value
     *
     * @return array
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
     * @return array
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
        return 'nameserver_tsigkey_index';
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
