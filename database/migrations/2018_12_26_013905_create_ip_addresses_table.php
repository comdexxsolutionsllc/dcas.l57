<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_owner')->unsigned()->nullable();
            $table->integer('network_interface_card_id')->unsigned();
            $table->integer('firewall_zone_id')->unsigned()->default(1)->nullable();
            $table->integer('port_number')->unsigned();
            $table->string('accountable_type')->nullable();
            $table->integer('accountable_id')->unsigned()->nullable();
            $table->string('ip_address');
            $table->enum('ip_address_type', ['IPv4', 'IPv6', 'Reserved'])->default('IPv4');
            $table->enum('ip_address_visibility', ['private', 'public'])->default('public');
            $table->string('gateway_address');
            $table->integer('subnet_address_id')->unsigned();
            $table->text('other_ip_addresses')->nullable();
            $table->boolean('active')->default(true);
            $table->longText('notes')->nullable();
            $table->timestamp('allocation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_addresses');
    }
}
