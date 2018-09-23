<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Reseller
 *
 * @property int $id
 * @property string $account_id
 * @property int $company_id
 * @property string|null $expiry_date
 * @property int $salesrep_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereSalesrepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reseller extends Model
{

    //
}
