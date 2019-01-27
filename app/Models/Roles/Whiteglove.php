<?php

namespace App\Models\Roles;

use App\Models\Support\Ticket;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Roles\Whiteglove
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\BaseRole permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\BaseRole role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereCartSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereLastActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Roles\Whiteglove whereUsername($value)
 * @mixin \Eloquent
 */
class Whiteglove extends BaseRole
{

    /**
     * @var string
     */
    protected $guard = 'whitegloves';

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
    protected $guard_name = 'whitegloves';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'whitegloves_index';
    }

    ///**
    // * @return \Illuminate\Database\Eloquent\Relations\HasMany
    // */
    //public function tickets(): HasMany
    //{
    //    return $this->hasMany(\App\Models\Support\Ticket::class);
    //}

    /**
     * Get all of the whitegloves' tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function tickets(): MorphMany
    {
        return $this->morphMany(Ticket::class, 'ticketable');
    }
}
