<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Company
 *
 * @property int $id
 * @property string $name
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_phone
 * @property string $phone_type
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company wherePhoneType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Company extends Model
{

    //
}
