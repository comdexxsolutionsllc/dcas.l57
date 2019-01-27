<?php

namespace App\Models\General;

use App\Models\BaseModel;

/**
 * App\Models\General\Product
 *
 * @property int                             $id
 * @property string                          $qty On-hand qty
 * @property string                          $name
 * @property string|null                     $description
 * @property bool                            $taxable
 * @property bool                            $lineItem
 * @property string                          $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereLineItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereTaxable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'qty',
        'name',
        'taxable',
        'lineItem',
        'price',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'taxable'  => 'boolean',
        'lineItem' => 'boolean',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'products_index';
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
