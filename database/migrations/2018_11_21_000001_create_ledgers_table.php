<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type')->nullable();
            $table->uuid('user_id')->nullable();
            $table->morphs('recordable');
            $table->unsignedTinyInteger('context');
            $table->string('event');
            $table->json('properties');
            $table->json('modified');
            $table->json('extra');
            $table->json('pivot')->nullable();
            $table->text('url')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('signature');
            $table->timestamps();

            $table->index([
                'user_id',
                'user_type',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
}