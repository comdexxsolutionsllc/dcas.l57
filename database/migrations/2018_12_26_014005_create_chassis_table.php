<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChassisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chassis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_owner')->unsigned()->nullable();
            $table->string('accountable_type')->nullable();
            $table->integer('accountable_id')->unsigned()->nullable();
            $table->string('vendor');
            $table->mediumText('model');
            $table->string('serial_number')->nullable();
            $table->char('form_factor_in_u', 3);
            $table->enum('chassis_type', ['rackmount', 'tower']);
            $table->mediumText('power_supply');
            $table->integer('hot_swap_drive_bays')->unsigned();
            $table->integer('internal_drive_bays')->unsigned();
            $table->integer('expansion_slots')->unsigned();
            $table->text('expansion_slot_information');
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
        Schema::dropIfExists('chassis');
    }
}
