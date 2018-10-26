<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('security_group_serial');
            $table->string('source');
            $table->enum('direction', ['inbound', 'outbound']);
            $table->string('protocol');
            $table->json('port_range');
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
        Schema::dropIfExists('security_groups');
    }
}
