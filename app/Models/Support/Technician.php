<?php

namespace App\Models\Support;

use App\Models\Roles\Employee;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Support\Technician
 *
 * @property int $id
 * @property int $department_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Roles\Employee $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Technician whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Technician whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Technician whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Technician whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Technician whereUserId($value)
 * @mixin \Eloquent
 */
class Technician extends Pivot
{

    /**
     * @var string
     */
    protected $table = 'department_user';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'department_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    ///**
    // * Get all of the ticket's notes.
    // *
    // * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    // */
    //public function notes(): MorphMany
    //{
    //    return $this->morphMany('App\Note', 'noteable');
    //}
}
