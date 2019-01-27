<?php

namespace App\Models\Roles;

use App\Models\Support\SalesRep;
use App\Models\Support\Ticket;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Roles\Employee
 *
 * @property int                                                                                                            $id
 * @property string                                                                                                         $employee_id
 * @property string                                                                                                         $name
 * @property string                                                                                                         $username
 * @property string                                                                                                         $email
 * @property bool|\DateTime                                                                                                 $email_verified_at
 * @property string                                                                                                         $password
 * @property string|null                                                                                                    $cover
 * @property string|null                                                                                                    $avatar
 * @property string|null                                                                                                    $remember_token
 * @property bool|\DateTime                                                                                                 $deleted_at
 * @property bool|\DateTime                                                                                                 $created_at
 * @property bool|\DateTime                                                                                                 $updated_at
 * @property string|null                                                                                                    $last_active
 * @property string|null                                                                                                    $cart_session_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[]                                       $clients
 * @property-read string                                                                                                    $cart_instance
 * @property bool|\DateTime                                                                                                 $trial_ends_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[]                           $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[]                                 $roles
 * @property-read \App\Models\Support\SalesRep                                                                              $salesrep
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[]                                  $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Support\Ticket[]                                     $tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[]                                        $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\BaseRole permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\BaseRole role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereCartSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereLastActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Employee whereUsername($value)
 * @mixin \Eloquent
 */
class Employee extends BaseRole
{

    /**
     * @var string
     */
    protected $guard = 'employee';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'trial_ends_at',
        'remember_token',
        'last_active',
    ];

    /**
     * @var string
     */
    protected $guard_name = 'employee';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'employees_index';
    }

    ///**
    // * @return \Illuminate\Database\Eloquent\Relations\HasMany
    // */
    //public function tickets(): HasMany
    //{
    //    return $this->hasMany(\App\Models\Support\Ticket::class);
    //}

    /**
     * Get all of the employee's tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function tickets(): MorphMany
    {
        return $this->morphMany(Ticket::class, 'ticketable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salesrep(): HasOne
    {
        return $this->hasOne(SalesRep::class);
    }
}
