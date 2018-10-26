<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetRegionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->uuid('identifier');
            $table->string('endpoint');
            $table->enum('protocol', ['http', 'https'])->default('https');
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
        Schema::dropIfExists('asset_regions');
    }
}
