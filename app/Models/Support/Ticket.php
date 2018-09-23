<?php

namespace App\Models\Support;

use App\Models\Roles\Customer;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support\Ticket
 *
 * @property int $id
 * @property string $ticket_id
 * @property string $title
 * @property string $body
 * @property int $status_id
 * @property int $department_id
 * @property int $user_id
 * @property int $technician_assigned_id
 * @property int $is_resolved
 * @property bool|\DateTime $deleted_at
 * @property bool|\DateTime $created_at
 * @property bool|\DateTime $updated_at
 * @property-read \App\Models\Support\Department $department
 * @property-read \App\Models\Support\Status $status
 * @property-read \App\Models\Support\Technician $technicianAssigned
 * @property-read \App\Models\Roles\Customer $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereIsResolved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereTechnicianAssignedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Ticket whereUserId($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'title',
        'body',
        'status_id',
        'department_id',
        'user_id',
        'technician_assigned_id',
        'is_resolved',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the status for this model.
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * Get the department for this model.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    /**
     * Get the technician assigned for this model.
     */
    public function technicianAssigned()
    {
        return $this->belongsTo(Technician::class, 'technician_assigned_id');
    }

    /**
     * Get deleted_at in array format
     *
     * @param  string $value
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
     * @param  string $value
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
     * @param  string $value
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
        return 'tickets_index';
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
