<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('registrar_id')->unsigned();
            $table->string('domain_name');
            $table->boolean('active')->default(true);
            $table->boolean('monitor')->default(false);
            $table->timestamp('whois_record_updated')->nullable();
            $table->timestamp('whois_record_created')->nullable();
            $table->timestamp('whois_record_expiry')->nullable();
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
        Schema::dropIfExists('domains');
    }
}
