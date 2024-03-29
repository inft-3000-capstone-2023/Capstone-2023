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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_customer_id');
            $table->foreignId('event_id');
            $table->decimal('total', $precision = 8, $scale = 2);
            $table->integer('number_tickets');
            $table->string('qr_code_string');
            $table->timestamps();

            //fk
            $table->foreign('client_customer_id')->references('id')->on('client_customers');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
