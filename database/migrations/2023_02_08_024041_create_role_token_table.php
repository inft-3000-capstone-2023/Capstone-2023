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
        Schema::create('role_token', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id');
            $table->foreignId('token_id');
            $table->timestamps();

            //fk
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('token_id')->references('id')->on('tokens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_token');
    }
};
