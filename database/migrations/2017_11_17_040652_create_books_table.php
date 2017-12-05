<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->integer('gmd_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->string('judul');
            $table->string('edition');
            $table->string('isbn');
            $table->string('year');
            $table->string('collation');
            $table->string('class');
            $table->string('language');
            $table->string('publish_place');
            $table->string('synopsis');
            $table->string('image');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreign('author_id')
                ->references('id')->on('authors')
                ->onDelete('cascade');
            $table->foreign('publisher_id')
                ->references('id')->on('publishers')
                ->onDelete('cascade');
            $table->foreign('gmd_id')
                ->references('id')->on('gmds')
                ->onDelete('cascade');
            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->foreign('location_id')
                ->references('id')->on('locations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
