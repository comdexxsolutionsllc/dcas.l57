<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherboardTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motherboard_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor', 30);
            $table->mediumText('model');
            $table->enum('form_factor', [
                'AT',
                'Baby AT',
                'ATX',
                'Mini ATX',
                'Micro ATX',
                'Flex ATX',
                'LPX',
                'Mini LPX',
                'NLX',
            ]);
            $table->integer('assigned_chassis')->unsigned()->nullable();
            $table->json('assigned_hdds');
            $table->json('assigned_memory');
            $table->json('assigned_networking_cards');
            $table->json('assigned_raid_cards');
            $table->longText('bios_features');
            $table->string('chipset');
            $table->longText('expansion_slots');
            $table->mediumText('front_side_bus');
            $table->enum('hdd_connection_type', [
                'SCSI',
                'SATA',
                'SAS',
            ]);
            $table->json('processor_information');
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
        Schema::dropIfExists('motherboard_types');
    }
}
