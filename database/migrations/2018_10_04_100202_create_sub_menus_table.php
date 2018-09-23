<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->string('url');
            $table->string('target')->nullable();
            $table->string('route')->nullable();
            $table->string('icon')->nullable();
            $table->integer('level')->unsigned()->default(0);
            $table->string('can')->nullable();
            $table->integer('menu_id')->nullable();
            $table->integer('submenu_id')->nullable();
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
        Schema::dropIfExists('sub_menus');
    }
}
