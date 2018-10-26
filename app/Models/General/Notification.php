<?php

namespace App\Models\General;

use App\Models\BaseModel;

/**
 * App\Models\General\Notification
 *
 * @property string                                                                          $id
 * @property string                                                                          $type
 * @property string                                                                          $notifiable_type
 * @property int                                                                             $notifiable_id
 * @property string                                                                          $data
 * @property bool|\DateTime                                                                  $read_at
 * @property bool|\DateTime                                                                  $created_at
 * @property bool|\DateTime                                                                  $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Notification extends BaseModel
{

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
    ];

    /**
     * Set the read_at.
     *
     * @param string $value
     *
     */
    public function setReadAtAttribute($value)
    {
        $this->attributes['read_at'] = ! empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get read_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getReadAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

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
        return 'notifications_index';
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
