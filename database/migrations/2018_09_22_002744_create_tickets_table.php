<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_id');
            $table->string('title');
            $table->text('body');
            $table->integer('status_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->string('account_type');
            $table->integer('technician_assigned_id')->unsigned();
            $table->boolean('is_resolved')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('tickets');
    }
}
