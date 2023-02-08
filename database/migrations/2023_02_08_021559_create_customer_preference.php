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
        Schema::create('customer_preference', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('preference_id');
            $table->timestamps();

            //fk
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('preference_id')->references('id')->on('preferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_preference');
    }
};
