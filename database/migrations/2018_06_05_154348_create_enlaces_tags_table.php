<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnlacesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlace_tag', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('enlace_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['enlace_id','tag_id']);
            $table->foreign('enlace_id')->references('id')->on('enlaces')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlace_tag');
    }
}
