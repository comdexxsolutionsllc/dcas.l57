<?php

namespace App\Models\General;

use Spatie\Permission\Models\Permission as BasePermission;

/**
 * App\Models\General\Permission
 *
 * @property int                                                                                  $id
 * @property string                                                                               $name
 * @property string                                                                               $guard_name
 * @property bool|\DateTime                                                                       $created_at
 * @property bool|\DateTime                                                                       $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[]       $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Roles\Customer[]           $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends BasePermission
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
        return 'permissions_index';
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
