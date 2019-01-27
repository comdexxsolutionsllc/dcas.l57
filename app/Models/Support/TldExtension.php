<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\TldExtension
 *
 * @property int                             $id
 * @property string                          $domain
 * @property string|null                     $description
 * @property string                          $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\TldExtension whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TldExtension extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'domain',
        'description',
        'type',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'tldextension_index';
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
