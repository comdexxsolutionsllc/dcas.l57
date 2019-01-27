<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpus', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('architecture', ['x86', 'x64'])->default('x64');
            $table->text('vendor');
            $table->text('family');
            $table->text('model');
            $table->text('speed');
            $table->text('cache_size');
            $table->integer('number_of_cores')->unsigned();
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
        Schema::dropIfExists('cpus');
    }
}
