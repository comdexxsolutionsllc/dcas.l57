<?php

namespace App\Models\Nameserver;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nameserver\Domain
 *
 * @property int $id
 * @property string $name
 * @property string|null $master
 * @property int|null $last_check
 * @property string $type
 * @property int|null $notified_serial
 * @property string|null $account
 * @property array $created_at
 * @property array $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereLastCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereNotifiedSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Domain extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_domains';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'master',
        'last_check',
        'type',
        'notified_serial',
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
