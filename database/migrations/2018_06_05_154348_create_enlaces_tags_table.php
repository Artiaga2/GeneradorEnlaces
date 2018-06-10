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
        Schema::create('enlaces_tags', function (Blueprint $table) {
            $table->integer('enlaces_id')->unsigned();
            $table->integer('tags_id')->unsigned();
            $table->primary(['enlaces_id','tags_id']);
            $table->foreign('enlaces_id')->references('id')->on('enlaces')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlaces_tags');
    }
}
