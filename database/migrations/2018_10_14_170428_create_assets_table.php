<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @todo
 */
class CreateAssetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('hardware_id');
            $table->string('status');
            $table->integer('datacenter_id')->unsigned()->nullable();
            $table->integer('switch_id')->unsigned()->nullable();
            $table->string('switchport_id')->nullable();
            $table->text('network_interface_cards');
            $table->string('port_speed')->nullable();
            $table->ipAddress('private_ip')->nullable();
            $table->string('chassis');
            $table->string('motherboard_type');
            $table->text('cpus');
            $table->text('memory');
            $table->text('disks');
            $table->string('operating_system')->nullable();
            $table->string('control_panel')->nullable();
            $table->string('administrator_password')->nullable();
            $table->integer('onhand_qty')->unsigned();
            $table->integer('pending_testing_qty')->unsigned();
            $table->integer('rma_qty')->unsigned();
            $table->timestamp('last_checkin')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
