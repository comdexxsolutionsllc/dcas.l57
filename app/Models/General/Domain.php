<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Domain
 *
 * @property int $id
 * @property int $account_id
 * @property int $registrar_id
 * @property string $domain_name
 * @property int $active
 * @property int $monitor
 * @property string|null $whois_record_updated
 * @property string|null $whois_record_created
 * @property string|null $whois_record_expiry
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereDomainName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereMonitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereRegistrarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereWhoisRecordCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereWhoisRecordExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Domain whereWhoisRecordUpdated($value)
 * @mixin \Eloquent
 */
class Domain extends Model
{

    //
}
