<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ModifyTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('account_id');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('account_type');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->string("ticketable_type")->default('');

            $table->bigInteger("ticketable_id")->unsigned()->default(0);

            $table->index(["ticketable_type", "ticketable_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->addColumn('integer', 'account_id')->unsigned()->default(0);
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->addColumn('string', 'account_type')->default('');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->dropIndex(["ticketable_type", "ticketable_id"]);

            $table->dropColumn("ticketable_type");

            $table->dropColumn("ticketable_id");
        });
    }
}
