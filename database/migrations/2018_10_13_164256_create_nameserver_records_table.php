<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameserverRecordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nameserver_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('content')->nullable();
            $table->integer('ttl')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('change_date')->nullable();
            $table->tinyInteger('disabled')->default(0);
            $table->string('ordername')->nullable();
            $table->tinyInteger('auth')->default(1);
            $table->timestamps();

            $table->index(['name', 'type']);
            $table->index('domain_id');
            $table->index(['domain_id', 'ordername']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nameserver_records');
    }
}
