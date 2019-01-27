<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameserverCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nameserver_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id')->unsigned();
            $table->string('name');
            $table->string('type');
            $table->integer('modified_at');
            $table->string('account');
            $table->string('comment');
            $table->timestamps();

            $table->index('domain_id');
            $table->index(['name', 'type']);
            $table->index(['domain_id', 'modified_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nameserver_comments');
    }
}
