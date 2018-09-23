<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Service
 *
 * @property int $id
 * @property int $account_id
 * @property string $service_type
 * @property string $status
 * @property string|null $last_payment
 * @property string|null $last_invoice
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereLastInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereLastPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{

    //
}
