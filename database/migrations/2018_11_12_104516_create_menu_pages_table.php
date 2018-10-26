<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('menu_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text')->nullable();
            $table->string('route')->nullable();
            $table->string('url')->nullable();
            $table->string('target')->nullable();
            $table->string('icon')->nullable();
            $table->string('can')->nullable();
            $table->boolean('isTitle')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::dropIfExists('menu_pages');
    }
}
