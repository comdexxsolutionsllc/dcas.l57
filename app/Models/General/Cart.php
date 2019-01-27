<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Cart
 *
 * @property int                             $id
 * @property string                          $cart_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart whereCartData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Cart whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'cart_data',
    ];

    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize($value);
    }

    public function getCartDataAttribute($value)
    {
        return unserialize($value);
    }
}
