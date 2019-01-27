<?php

namespace App\Models\Nameserver;

use App\Models\BaseModel;

/**
 * App\Models\Nameserver\Record
 *
 * @property int                                $id
 * @property int                                $domain_id
 * @property string|null                        $name
 * @property string|null                        $type
 * @property string|null                        $content
 * @property int|null                           $ttl
 * @property int|null                           $priority
 * @property int|null                           $change_date
 * @property int                                $disabled
 * @property string|null                        $ordername
 * @property int                                $auth
 * @property array                              $created_at
 * @property array                              $updated_at
 * @property-read \App\Models\Nameserver\Domain $domain
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereChangeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereOrdername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereTtl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Record whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Record extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_records';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain_id',
        'name',
        'type',
        'content',
        'ttl',
        'priority',
        'change_date',
        'disabled',
        'ordername',
        'auth',
    ];

    /**
     * Get the domain for this model.
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }

    /**
     * Get created_at in array format
     *
     * @param string $value
     *
     * @return array
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
     * @return array
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
        return 'nameserver_record_index';
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
