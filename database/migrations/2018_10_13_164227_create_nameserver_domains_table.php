<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameserverDomainsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nameserver_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('master')->nullable();
            $table->integer('last_check')->nullable();
            $table->string('type');
            $table->integer('notified_serial')->nullable();
            $table->string('account')->nullable();
            $table->timestamps();

            $table->index('name')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nameserver_domains');
    }
}
