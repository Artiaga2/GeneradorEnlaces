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
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('categoria_id');
            $table->string('titulo');
            $table->string('uri');
            $table->string('slug')->unique();
            $table->enum('tipo',['enlace', 'PDF', 'imagen', 'nota'])->default('enlace');
            $table->string('descripcion');
            $table->enum('privacidad',['publico', 'privado'])->default('publico');
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
        Schema::dropIfExists('enlaces');
    }
}
