<?php

namespace App\Models\Roles;

use App\Models\Support\Ticket;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Roles\Vendor
 *
 * @property int                                                                                                            $id
 * @property string                                                                                                         $account_id
 * @property string                                                                                                         $name
 * @property string                                                                                                         $username
 * @property string                                                                                                         $email
 * @property bool|\DateTime                                                                                                 $email_verified_at
 * @property string                                                                                                         $password
 * @property string|null                                                                                                    $stripe_id
 * @property string|null                                                                                                    $card_brand
 * @property string|null                                                                                                    $card_last_four
 * @property bool|\DateTime                                                                                                 $trial_ends_at
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
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[]                           $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[]                                 $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[]                                  $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Support\Ticket[]                                     $tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[]                                        $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\BaseRole permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\BaseRole role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereCartSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereLastActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Vendor whereUsername($value)
 * @mixin \Eloquent
 */
class Vendor extends BaseRole
{

    /**
     * @var string
     */
    protected $guard = 'vendor';

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
    protected $guard_name = 'vendor';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'vendors_index';
    }

    ///**
    // * @return \Illuminate\Database\Eloquent\Relations\HasMany
    // */
    //public function tickets(): HasMany
    //{
    //    return $this->hasMany(\App\Models\Support\Ticket::class);
    //}

    /**
     * Get all of the vendor's tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function tickets(): MorphMany
    {
        return $this->morphMany(Ticket::class, 'ticketable');
    }
}
