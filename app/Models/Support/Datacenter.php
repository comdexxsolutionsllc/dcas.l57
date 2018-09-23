<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Datacenter
 *
 * @property int $id
 * @property string $code
 * @property string $location
 * @property string $status
 * @property string $opening_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereOpeningDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Datacenter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Datacenter extends Model
{

    //
}
