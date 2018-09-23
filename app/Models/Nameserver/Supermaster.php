<?php

namespace App\Models\Nameserver;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nameserver\Supermaster
 *
 * @property int $id
 * @property string $ip
 * @property string $nameserver
 * @property string $account
 * @property array $created_at
 * @property array $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereNameserver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Supermaster whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supermaster extends Model
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
     * @param  string $value
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
     * @param  string $value
     *
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }
}
