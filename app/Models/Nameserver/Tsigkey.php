<?php

namespace App\Models\Nameserver;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nameserver\Tsigkey
 *
 * @property int $id
 * @property string $name
 * @property string $algorithm
 * @property string $secret
 * @property array $created_at
 * @property array $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereAlgorithm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Tsigkey whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tsigkey extends Model
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
