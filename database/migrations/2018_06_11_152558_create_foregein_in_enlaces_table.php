<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForegeinInEnlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enlaces', function (Blueprint $table) {
            $table->foreign('like_id')->references('id')->on('like')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('comentario_id')->references('id')->on('comentarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enlaces', function (Blueprint $table) {
            $table->dropForeign(['like_id']);
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['comentario_id']);

            $table->dropColumn('like_id');
            $table->dropColumn('categoria_id');
            $table->dropColumn('comentario_id');
        });
    }
}
