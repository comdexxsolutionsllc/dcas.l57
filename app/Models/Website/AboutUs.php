<?php

namespace App\Models\Website;

use App\Models\BaseModel;
use Laravel\Scout\Searchable;

/**
 * App\Models\Website\AboutUs
 *
 * @property int                             $id
 * @property string                          $name
 * @property string|null                     $portrait
 * @property string                          $job_title
 * @property string                          $job_summary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string                     $portrait_link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs whereJobSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs wherePortrait($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website\AboutUs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AboutUs extends BaseModel
{

    use Searchable;

    /**
     * @var string
     */
    protected $table = 'about_us';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'portrait',
        'job_title',
        'job_summary',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'portrait_link',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'aboutus_index';
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

    /**
     * @return string
     */
    public function getPortraitLinkAttribute(): string
    {
        return ! is_null($this->portrait) ? $this->portrait : 'http://placehold.it/200x200';
    }

    /**
     * Path to resource.
     *
     * @return string
     */
    public function path(): string
    {
        return "/about-us/{$this->id}";
    }
}
