<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlPanelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_panels', function (Blueprint $table) {
            $table->increments('id');
            $table->text('control_panel');
            $table->boolean('free');
            $table->text('frontend');
            $table->text('backend');
            $table->text('databases');
            $table->text('dns');
            $table->text('ftp');
            $table->text('email');
            $table->boolean('multi_server');
            $table->enum('operating_system', ['linux', 'windows']);
            $table->boolean('ipv6_enabled');
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
        Schema::dropIfExists('control_panels');
    }
}
