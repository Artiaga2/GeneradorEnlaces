<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnlacesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlaces_user', function (Blueprint $table) {

            $table->integer('enlace_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->primary(['enlace_id','user_id']);
            $table->foreign('enlace_id')->references('id')->on('enlaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlaces_users');
    }
}
