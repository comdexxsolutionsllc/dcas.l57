<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCartSessionIdToUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! (Schema::hasColumn('customers', 'cart_session_id'))) {
            Schema::table('customers', function (Blueprint $table) {
                $table->string('cart_session_id')->nullable()->default(null);
            });
        }

        if (! (Schema::hasColumn('employees', 'cart_session_id'))) {
            Schema::table('employees', function (Blueprint $table) {
                $table->string('cart_session_id')->nullable()->default(null);
            });
        }

        if (! (Schema::hasColumn('vendors', 'cart_session_id'))) {
            Schema::table('vendors', function (Blueprint $table) {
                $table->string('cart_session_id')->nullable()->default(null);
            });
        }

        if (! (Schema::hasColumn('whitegloves', 'cart_session_id'))) {
            Schema::table('whitegloves', function (Blueprint $table) {
                $table->string('cart_session_id')->nullable()->default(null);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ((Schema::hasColumn('customers', 'cart_session_id'))) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropColumn('cart_session_id');
            });
        }

        if ((Schema::hasColumn('employees', 'cart_session_id'))) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropColumn('cart_session_id');
            });
        }

        if ((Schema::hasColumn('vendors', 'cart_session_id'))) {
            Schema::table('vendors', function (Blueprint $table) {
                $table->dropColumn('cart_session_id');
            });
        }

        if ((Schema::hasColumn('whitegloves', 'cart_session_id'))) {
            Schema::table('whitegloves', function (Blueprint $table) {
                $table->dropColumn('cart_session_id');
            });
        }
    }
}
