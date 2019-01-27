<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceLimitsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_limits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resource_operation_name');
            $table->integer('default_limit')->default(- 1);
            $table->integer('min_limit')->unsigned()->default(0);
            $table->integer('max_limit')->unsigned();
            $table->integer('burst_capacity')->unsigned()->nullable();
            $table->boolean('is_calls_per_second')->default(false);
            $table->timestamp('is_adjustable')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('service_limits');
    }
}
