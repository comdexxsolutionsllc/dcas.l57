<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworkInterfaceCardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_interface_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('speed', [
                '10Mbps',
                '100Mbps',
                '1000Mbps',
                '10GbE',
                '25GbE',
                '50GbE',
                '100GbE',
            ])->default('100Mbps');
            $table->enum('duplex', ['half', 'full'])->default('full');
            $table->char('mac_address', 12)->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('number_of_ports')->unsigned();
            $table->string('vendor', 30);
            $table->mediumText('model');
            $table->enum('status', ['onhand', 'pending_testing', 'rma']);
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
        Schema::dropIfExists('network_interface_cards');
    }
}
