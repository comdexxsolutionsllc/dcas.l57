larave<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastActiveToRolesTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->timestamp('last_active')->nullable();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->timestamp('last_active')->nullable();
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->timestamp('last_active')->nullable();
        });

        Schema::table('whitegloves', function (Blueprint $table) {
            $table->timestamp('last_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('last_active');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('last_active');
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn('last_active');
        });

        Schema::table('whitegloves', function (Blueprint $table) {
            $table->dropColumn('last_active');
        });
    }
}
