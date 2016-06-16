<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NoteCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('note_category');
        Schema::dropIfExists('note');
        Schema::dropIfExists('category');
        
        Schema::create('note', function(Blueprint $newTable){
            $newTable->increments('id');
            $newTable->text('content');
        });

        Schema::create('category', function(Blueprint $newTable){
            $newTable->increments('id');
            $newTable->string('name', 255);
        });

        Schema::create('note_category', function(Blueprint $newTable){
            $newTable->integer('note_id')->unsigned();
            $newTable->integer('category_id')->unsigned();
            $newTable->primary(array('note_id', 'category_id'));

            $newTable->foreign('note_id')->references('id')->on('note');
            $newTable->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('note_category');
        Schema::dropIfExists('note');
        Schema::dropIfExists('category');
    }
}
