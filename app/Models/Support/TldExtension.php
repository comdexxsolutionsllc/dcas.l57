<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support\TldExtension
 *
 * @property int $id
 * @property string $domain
 * @property string|null $description
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TldExtension extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'domain',
        'description',
        'type',
    ];
}
