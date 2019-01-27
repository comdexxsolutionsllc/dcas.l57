<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherboardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motherboards', function (Blueprint $table) {
            $table->increments('id');
            $table->text('vendor');
            $table->text('model');
            $table->integer('cpu_id')->unsigned();
            $table->string('chipset');
            $table->string('socket_type');
            $table->string('form_factor');
            $table->text('dvi')->nullable();
            $table->text('hdmi')->nullable();
            $table->text('display_port')->nullable();
            $table->string('bios');
            $table->string('graphics');
            $table->string('audio');
            $table->string('audio_chipset');
            $table->string('lan');
            $table->integer('max_lan_speed')->unsigned();
            $table->integer('memory_slots')->unsigned();
            $table->integer('maximum_memory_supported')->unsigned();
            $table->json('channels_supported');
            $table->json('storage');
            $table->json('connectors');
            $table->json('supported_oses');
            $table->text('notes')->nullable();
            $table->boolean('eol_announced')->default(false);
            $table->boolean('ipmi_enabled')->default(true);
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
        Schema::dropIfExists('motherboards');
    }
}
