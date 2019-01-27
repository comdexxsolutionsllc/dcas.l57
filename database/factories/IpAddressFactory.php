<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Support\IpAddress::class, function (Faker $faker) {
    return [
        'asset_owner'               => factory(\App\Models\General\Asset::class),
        'network_interface_card_id' => factory(\App\Models\Support\NetworkInterfaceCard::class),
        'firewall_zone_id'          => factory(\App\Models\Support\FirewallZone::class),
        'port_number'               => $faker->randomNumber(2),
        'accountable_type'          => 'App\Models\Roles\Customer',
        'accountable_id'            => 1,
        'ip_address'                => $faker->ipv4,
        'ip_address_type'           => $faker->randomElement(['IPv4', 'IPv6', 'Reserved']),
        'ip_address_visibility'     => $faker->randomElement(['private', 'public']),
        'gateway_address'           => $faker->ipv4,
        'subnet_address_id'         => factory(\App\Models\Support\SubnetAddress::class),
        'other_ip_addresses'        => null,
        'active'                    => $faker->boolean,
        'notes'                     => null,
        'allocation_date'           => $faker->dateTime(),
    ];
});
