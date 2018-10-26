<?php

namespace App\Models\General;

use App\Models\BaseModel;
use App\Models\Roles\Customer;

/**
 * App\Models\General\Subscription
 *
 * @property int                                                                             $id
 * @property int                                                                             $user_id
 * @property string                                                                          $name
 * @property string                                                                          $stripe_id
 * @property string                                                                          $stripe_plan
 * @property int                                                                             $quantity
 * @property bool|\DateTime                                                                  $trial_ends_at
 * @property bool|\DateTime                                                                  $ends_at
 * @property bool|\DateTime                                                                  $created_at
 * @property bool|\DateTime                                                                  $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read \App\Models\Roles\Customer                                                 $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereStripePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Subscription whereUserId($value)
 * @mixin \Eloquent
 */
class Subscription extends BaseModel
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'stripe_id',
        'stripe_plan',
        'quantity',
        'trial_ends_at',
        'ends_at',
    ];

    /**
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    /**
     * Set the trial_ends_at.
     *
     * @param string $value
     *
     */
    public function setTrialEndsAtAttribute($value)
    {
        $this->attributes['trial_ends_at'] = ! empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Set the ends_at.
     *
     * @param string $value
     *
     */
    public function setEndsAtAttribute($value)
    {
        $this->attributes['ends_at'] = ! empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get trial_ends_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getTrialEndsAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
    }

    /**
     * Get ends_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getEndsAtAttribute($value)
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
        return 'subscriptions_index';
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
