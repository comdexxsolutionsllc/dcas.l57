<?php

namespace App\Models\Website;

use App\Models\BaseModel;

/**
 * App\Models\Website\MenuPage
 *
 * @property int                                                                             $id
 * @property string|null                                                                     $text
 * @property string|null                                                                     $route
 * @property string|null                                                                     $url
 * @property string|null                                                                     $target
 * @property string|null                                                                     $icon
 * @property string|null                                                                     $can
 * @property bool                                                                            $isTitle
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereCan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereIsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\MenuPage whereUrl($value)
 * @mixin \Eloquent
 */
class MenuPage extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'route',
        'url',
        'target',
        'icon',
        'can',
        'isTitle',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'isTitle' => 'bool',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'menupage_index';
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
