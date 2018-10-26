<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaidCardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raid_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->text('vendor');
            $table->text('model');
            $table->timestamp('launch_date');
            $table->timestamp('expected_discontinuance')->nullable();
            $table->integer('data_transfer_rate')->unsigned();
            $table->json('supported_devices');
            $table->json('supported_raid_levels');
            $table->boolean('jbod_mode')->default(false);
            $table->integer('number_of_internal_ports')->unsigned();
            $table->integer('number_of_supported_devices')->unsigned();
            $table->integer('embedded_memory')->unsigned();
            $table->json('supported_oses');
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
        Schema::dropIfExists('raid_cards');
    }
}
