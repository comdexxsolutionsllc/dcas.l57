<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubnetAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnet_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('subnet_address');
            $table->ipAddress('network_block');
            $table->integer('network_mask')->unsigned();
            $table->integer('datacenter_id')->unsigned();
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
        Schema::dropIfExists('subnet_addresses');
    }
}
