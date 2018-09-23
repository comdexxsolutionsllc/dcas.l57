<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support\OperatingSystem
 *
 * @property int $id
 * @property string $architecture
 * @property string $type
 * @property string $name
 * @property string $notes
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereArchitecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\OperatingSystem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OperatingSystem extends Model
{

    //
}
