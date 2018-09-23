<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Website\Menu
 *
 * @property int $id
 * @property string $text
 * @property string $url
 * @property string|null $target
 * @property string|null $route
 * @property string|null $icon
 * @property string|null $can
 * @property int|null $submenu_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Website\SubMenu[] $submenus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereCan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereSubmenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\Menu whereUrl($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'text',
        'url',
        'target',
        'route',
        'icon',
        'can',
        'submenu_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submenus(): HasMany
    {
        return $this->hasMany(SubMenu::class);
    }
}
