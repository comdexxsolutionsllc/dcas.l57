<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\IpAddress
 *
 * @property int                                                                             $id
 * @property int|null                                                                        $asset_owner
 * @property int                                                                             $network_interface_card_id
 * @property int|null                                                                        $firewall_zone_id
 * @property int                                                                             $port_number
 * @property string|null                                                                     $accountable_type
 * @property int|null                                                                        $accountable_id
 * @property string                                                                          $ip_address
 * @property string                                                                          $ip_address_type
 * @property string                                                                          $ip_address_visibility
 * @property string                                                                          $gateway_address
 * @property int                                                                             $subnet_address_id
 * @property string|null                                                                     $other_ip_addresses
 * @property int                                                                             $active
 * @property string|null                                                                     $notes
 * @property string                                                                          $allocation_date
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereAccountableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereAccountableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereAllocationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereAssetOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereFirewallZoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereGatewayAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereIpAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereIpAddressVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereNetworkInterfaceCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereOtherIpAddresses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress wherePortNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereSubnetAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\IpAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IpAddress extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'asset_owner',
        'network_interface_card_id',
        'firewall_zone_id',
        'port_number',
        'accountable_type',
        'accountable_id',
        'ip_address',
        'ip_address_type',
        'ip_address_visibility',
        'gateway_address',
        'subnet_address_id',
        'other_ip_addresses',
        'active',
        'notes',
        'allocation_date',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'ipaddresses_index';
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
