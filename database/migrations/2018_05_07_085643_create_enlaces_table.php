<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('comentario_id')->unsigned()->nullable();
            $table->integer('like_id')->unsigned()->nullable();
            $table->string('titulo');
            $table->string('uri');
            $table->string('slug')->unique();
            $table->enum('tipo',['enlace', 'PDF', 'imagen', 'nota'])->default('enlace');
            $table->string('descripcion');
            $table->enum('privacidad',['publico', 'privado'])->default('publico');
            $table->timestamps();

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
        Schema::dropIfExists('enlaces');
    }
}
