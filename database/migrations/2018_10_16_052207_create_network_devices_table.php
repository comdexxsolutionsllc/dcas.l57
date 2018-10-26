<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworkDevicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asset_number');
            $table->string('serial_number')->nullable();
            $table->integer('network_device_type_id')->unsigned();
            $table->string('hostname');
            $table->ipAddress('ip_address');
            $table->ipAddress('ip_address_alt')->nullable();
            $table->string('hardware_maker');
            $table->string('hardware_version');
            $table->string('device_os_version');
            $table->integer('total_ports')->unsigned();
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
        Schema::dropIfExists('network_devices');
    }
}
