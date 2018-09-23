<?php

namespace App\Models\Nameserver;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nameserver\Domainmetadata
 *
 * @property int $id
 * @property int $domain_id
 * @property string|null $kind
 * @property string|null $content
 * @property array $created_at
 * @property array $updated_at
 * @property-read \App\Models\Nameserver\Domain $domain
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domainmetadata whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domainmetadata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domainmetadata whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domainmetadata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domainmetadata whereKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nameserver\Domainmetadata whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Domainmetadata extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nameserver_domainmetadata';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain_id',
        'kind',
        'content',
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
     * @param  string $value
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
     * @param  string $value
     *
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }
}
