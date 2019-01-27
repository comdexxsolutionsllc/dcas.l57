<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('vendor');
            $table->text('series');
            $table->text('model');
            $table->text('interface');
            $table->text('capacity');
            $table->text('seed');
            $table->text('cache');
            $table->text('latency');
            $table->text('form_factor');
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
        Schema::dropIfExists('disks');
    }
}
