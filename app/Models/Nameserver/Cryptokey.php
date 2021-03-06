<?php

namespace App\Models\Nameserver;

use App\Models\BaseModel;

/**
 * App\Models\Nameserver\Cryptokey
 *
 * @property int                                $id
 * @property int                                $domain_id
 * @property int                                $flags
 * @property int|null                           $active
 * @property string|null                        $content
 * @property array                              $created_at
 * @property array                              $updated_at
 * @property-read \App\Models\Nameserver\Domain $domain
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Cryptokey whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cryptokey extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_cryptokeys';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain_id',
        'flags',
        'active',
        'content',
    ];

    /**
     * Get the domain for this model.
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }

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
        return 'nameserver_cryptokey_index';
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
