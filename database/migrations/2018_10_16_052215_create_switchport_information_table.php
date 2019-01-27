<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSwitchportInformationTable
 *
 * @todo
 */
class CreateSwitchportInformationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switchport_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('network_device_id')->unsigned();
            $table->integer('switchport_number');
            $table->enum('category', [
                'managed',
                'hybrid/smart',
                'unmanaged',
            ])->default('unmanaged');
            $table->enum('port_speed', [
                10,
                100,
                1000,
                10000,
                40000,
                100000,
            ])->default(10);
            $table->enum('connection_type', [
                'ethernet/cat-5e',
                'ethernet/cat-6',
                'ethernet/cat-6a',
                'ethernet/cat-7',
                'fiber-channel/infiniband',
                'fiber-channel/osfp',
                'fiber-channel/sfp+',
                'fiber-channel/10g-cx4',
                'fiber-channel/lc',
                'fiber-channel/sc',
                'fiber-channel/st',
                'fiber-optic/st',
                'fiber-optic/sc',
                'fiber-optic/fc',
                'fiber-optic/mt-rj',
                'fiber-optic/lc',
                'coaxial',
            ])->default('ethernet/cat-7');
            $table->enum('poe_status', [
                'POE',
                'Non-POE',
            ])->default('POE');
            $table->enum('stackable_status', [
                'stackable',
                'standalone',
            ])->default('standalone');
            $table->enum('duplex_type', [
                'simplex',
                'half-duplex',
                'full-duplex',
            ])->default('full-duplex');
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
        Schema::dropIfExists('switchport_information');
    }
}
