<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Website\SubMenu
 *
 * @property int $id
 * @property string $text
 * @property string $url
 * @property string|null $target
 * @property string|null $route
 * @property string|null $icon
 * @property int $level
 * @property string|null $can
 * @property int|null $menu_id
 * @property int|null $submenu_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Website\Menu|null $menu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Website\SubMenu[] $submenus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereCan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereSubmenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\SubMenu whereUrl($value)
 * @mixin \Eloquent
 */
class SubMenu extends Model
{

    protected $fillable = [
        'text',
        'url',
        'target',
        'route',
        'icon',
        'level',
        'can',
        'menu_id',
        'submenu_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submenus(): HasMany
    {
        return $this->hasMany(SubMenu::class);
    }
}
