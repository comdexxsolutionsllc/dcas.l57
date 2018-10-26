<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\Comment
 *
 * @property int                                                                             $id
 * @property string                                                                          $body
 * @property string                                                                          $commentable_type
 * @property int                                                                             $commentable_id
 * @property bool|\DateTime                                                                  $created_at
 * @property bool|\DateTime                                                                  $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends BaseModel
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'commentable_type',
        'commentable_id',
    ];

    /**
     * Get created_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get updated_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'comments_index';
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
