<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Asset
 *
 * @property int $id
 * @property string $serial_number
 * @property string $hardware_id
 * @property string $status
 * @property int|null $datacenter_id
 * @property int|null $switch_id
 * @property string|null $switchport_id
 * @property string $network_interface_cards
 * @property string|null $port_speed
 * @property string|null $private_ip
 * @property string $chassis
 * @property string $motherboard_type
 * @property string $cpus
 * @property string $memory
 * @property string $disks
 * @property string|null $operating_system
 * @property string|null $control_panel
 * @property string|null $administrator_password
 * @property int $onhand_qty
 * @property int $pending_testing_qty
 * @property int $rma_qty
 * @property string|null $last_checkin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereAdministratorPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereControlPanel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereCpus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereDatacenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereDisks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereLastCheckin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereMemory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereMotherboardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereNetworkInterfaceCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereOnhandQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereOperatingSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset wherePendingTestingQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset wherePortSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset wherePrivateIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereRmaQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereSwitchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereSwitchportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Asset extends Model
{

    //
}
