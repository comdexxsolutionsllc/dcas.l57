<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceNamesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partition');
            $table->integer('service_namespace_id')->unsigned();
            $table->integer('service_region_id')->unsigned();
            $table->morphs('accountable');
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
        Schema::dropIfExists('resource_names');
    }
}
