<?php

namespace App\Models\General;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\General\Company
 *
 * @property int                               $id
 * @property string                            $name
 * @property string                            $contact_name
 * @property string|null                       $contact_email
 * @property string|null                       $contact_phone
 * @property string                            $phone_type
 * @property int                               $active
 * @property \Illuminate\Support\Carbon|null   $created_at
 * @property \Illuminate\Support\Carbon|null   $updated_at
 * @property-read \App\Models\General\Reseller $reseller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Company query()
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
class Company extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'phone_type',
        'active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reseller(): BelongsTo
    {
        return $this->belongsTo(Reseller::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'company_index';
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
