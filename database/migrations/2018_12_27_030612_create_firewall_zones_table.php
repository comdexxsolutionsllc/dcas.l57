<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirewallZonesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firewall_zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('network_asset_number');
            $table->integer('datacenter_id')->unsigned();
            $table->integer('network_device_id')->unsigned();
            $table->timestamp('available')->nullable();
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
        Schema::dropIfExists('firewall_zones');
    }
}
