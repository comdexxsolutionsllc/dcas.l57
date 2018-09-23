<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Queue
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $visible
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Queue whereVisible($value)
 * @mixin \Eloquent
 */
class Queue extends Model
{

    //
}
