<?php

namespace App\Models\General;

use Spatie\Permission\Models\Role as BaseRole;

/**
 * App\Models\General\Role
 *
 * @property int                                                                                  $id
 * @property string                                                                               $name
 * @property string                                                                               $guard_name
 * @property bool|\DateTime                                                                       $created_at
 * @property bool|\DateTime                                                                       $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Roles\Customer[]           $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends BaseRole
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
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
        return 'roles_index';
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
