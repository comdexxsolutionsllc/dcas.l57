<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetupAirportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Creates the users table
        Schema::create(\Config::get('airports.table_name'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->char('code', 3)->default('');
            $table->string('name')->default('');
            $table->char('country_code', 2)->default('');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop(\Config::get('airports.table_name'));
    }
}
