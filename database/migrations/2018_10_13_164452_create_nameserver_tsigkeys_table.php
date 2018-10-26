<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameserverTsigkeysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('nameserver_tsigkeys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('algorithm');
            $table->string('secret');
            $table->timestamps();

            $table->index(['name', 'algorithm'])->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nameserver_tsigkeys');
    }
}
