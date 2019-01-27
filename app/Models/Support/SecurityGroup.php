<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\SecurityGroup
 *
 * @property int                             $id
 * @property string                          $security_group_serial
 * @property string                          $source
 * @property string                          $direction
 * @property string                          $protocol
 * @property mixed                           $port_range
 * @property string|null                     $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup wherePortRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereProtocol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereSecurityGroupSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SecurityGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SecurityGroup extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'security_group_serial',
        'source',
        'direction',
        'protocol',
        'port_range',
        'comments',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'security_group_index';
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
