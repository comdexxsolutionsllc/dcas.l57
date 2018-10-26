<?php

namespace App\Models\Nameserver;

use App\Models\BaseModel;

/**
 * App\Models\Nameserver\Comment
 *
 * @property int                                                                             $id
 * @property int                                                                             $domain_id
 * @property string                                                                          $name
 * @property string                                                                          $type
 * @property int                                                                             $modified_at
 * @property string                                                                          $account
 * @property string                                                                          $comment
 * @property array                                                                           $created_at
 * @property array                                                                           $updated_at
 * @property-read \App\Models\Nameserver\Domain                                              $domain
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereModifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_comments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain_id',
        'name',
        'type',
        'modified_at',
        'account',
        'comment',
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
        return 'nameserver_comment_index';
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
