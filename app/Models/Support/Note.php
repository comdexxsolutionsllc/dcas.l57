<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support\Note
 *
 * @property int $id
 * @property string $body
 * @property string $noteable_type
 * @property int $noteable_id
 * @property bool|\DateTime $created_at
 * @property bool|\DateTime $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Note whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Note whereNoteableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Note whereNoteableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Note whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Note extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'noteable_type',
        'noteable_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get created_at in array format
     *
     * @param  string $value
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
     * @param  string $value
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
        return 'notes_index';
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
