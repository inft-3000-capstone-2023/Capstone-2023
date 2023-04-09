<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('client_id');
            $table->string('event_title');
            $table->text('event_description')->nullable();
            $table->integer('max_tickets_per_customer');
            $table->dateTime('date_time');
            $table->dateTime('end_time');
            $table->string('time_zone');
            $table->string('venue');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->decimal('ticket_price', $precision = 8, $scale = 2);

            //foreign key constraints
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
