<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('authorId')->unsigned()->index()->nullable();
            $table->foreign('authorId')->references('id')->on('users')->onDelete('cascade');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('title');
            $table->longText('description');
            $table->longText('tips')->nullable();
            $table->longText('references')->nullable();
            $table->longText('articleInfo')->nullable();
            $table->text('warnings')->nullable();
            $table->longText('thingsNeeded')->nullable();
            $table->integer('views');
            $table->longText('videoTranscript')->nullable();
            $table->longText('keyTakeaways')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
