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
        Schema::create('client_role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_user_id');
            $table->foreignId('role_id');
            $table->timestamps();

            //fk
            $table->foreign('client_user_id')->references('id')->on('client_users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_role_user');
    }
};
