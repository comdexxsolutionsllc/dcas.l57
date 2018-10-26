<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memory', function (Blueprint $table) {
            $table->increments('id');
            $table->text('vendor');
            $table->text('model');
            $table->text('capacity');
            $table->text('type');
            $table->text('speed');
            $table->boolean('ecc')->default(false);
            $table->boolean('buffered')->default(false);
            $table->boolean('registered')->default(false);
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
        Schema::dropIfExists('memory');
    }
}
