<?php

namespace App\Models\Roles;

use App\Traits\ActiveStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use QCod\ImageUp\HasImageUploads;
use Spatie\Permission\Traits\HasRoles;

abstract class BaseRole extends Authenticatable
{

    use ActiveStatus, Billable, HasApiTokens, HasImageUploads, HasRoles, Notifiable, Searchable, SoftDeletes;

    /**
     * @var array
     */
    protected static $imageFields = [
        'cover',
        'avatar',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->cart_session_id = 'cart_' . md5(session()->getId() . date('Y-m-d'));

            $model->username = str_slug($model->name, '-');
        });

        static::retrieved(function (Model $model) {
            if (is_null($model->cart_session_id)) {
                $model->cart_session_id = 'cart_' . md5(session()->getId() . date('Y-m-d'));

                $model->save();
            }
        });
    }

    /**
     * Logout other devices.
     *
     * @param $password
     *
     * @return bool|null
     */
    public function logoutOtherDevices($password)
    {
        return \Auth::logoutOtherDevices($password);
    }

    /**
     * Set the email_verified_at.
     *
     * @param string $value
     *
     */
    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = ! empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Set the trial_ends_at.
     *
     * @param string $value
     */
    public function setTrialEndsAtAttribute($value)
    {
        $this->attributes['trial_ends_at'] = ! empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get email_verified_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getEmailVerifiedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);
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
     * Get deleted_at in array format
     *
     * @param string $value
     *
     * @return bool|\DateTime
     */
    public function getDeletedAtAttribute($value)
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
     * Get cart instance ID.
     *
     * @return string
     */
    public function getCartInstanceAttribute(): string
    {
        return $this->cart_session_id;
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
