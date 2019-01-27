<?php

namespace App\Models\General;

use App\Models\BaseModel;

/**
 * App\Models\General\Coupon
 *
 * @property int                             $id
 * @property string                          $type
 * @property string                          $code
 * @property string                          $value
 * @property string                          $minimum_amount
 * @property string                          $maximum_discount
 * @property \Illuminate\Support\Carbon      $valid_start_time
 * @property \Illuminate\Support\Carbon      $valid_end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereMaximumDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereMinimumAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereValidEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereValidStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Coupon whereValue($value)
 * @mixin \Eloquent
 */
class Coupon extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'type',
        'code',
        'value',
        'minimum_amount',
        'maximum_discount',
        'valid_start_time',
        'valid_end_time',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'valid_start_time' => 'datetime',
        'valid_end_time'   => 'datetime',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'coupons_index';
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
