<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\InvoiceItem
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $service_id
 * @property string $description
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InvoiceItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceItem extends Model
{

    //
}
