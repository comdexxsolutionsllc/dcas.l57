<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundEmailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbound_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('body_plain');
            $table->dateTime('date');
            $table->string('domain');
            $table->string('from');
            $table->string('from_full');
            $table->longText('message_headers');
            $table->string('message_id', 512)->unique();
            $table->text('message_url');
            $table->string('recipient');
            $table->string('sender');
            $table->longText('stripped_html');
            $table->longText('stripped_signature')->nullable();
            $table->longText('stripped_text');
            $table->string('subject');
            $table->dateTime('response_timestamp')->default(now());
            $table->string('token', 255)->unique();
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
        Schema::dropIfExists('inbound_emails');
    }
}
