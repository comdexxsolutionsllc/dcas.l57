<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTldExtensionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tld_extensions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain');
            $table->string('description')->nullable();
            $table->enum('type', [
                'country-code',
                'generic',
                'generic-restricted',
                'infrastructure',
                'sponsored',
                'test',
            ])->default('generic');
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
        Schema::dropIfExists('tld_extensions');
    }
}
