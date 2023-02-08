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
        Schema::create('client_customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('client_id');
            $table->timestamps();

            //fk
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('client_customer');
    }
};
