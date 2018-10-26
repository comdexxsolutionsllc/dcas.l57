<?php

namespace App\Models\Nameserver;

use App\Models\BaseModel;

/**
 * App\Models\Nameserver\Supermaster
 *
 * @property int                                                                             $id
 * @property string                                                                          $ip
 * @property string                                                                          $nameserver
 * @property string                                                                          $account
 * @property array                                                                           $created_at
 * @property array                                                                           $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereNameserver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supermaster extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_supermasters';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'nameserver',
        'account',
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
        return 'nameserver_supermaster_index';
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
