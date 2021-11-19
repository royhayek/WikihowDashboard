<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_methods', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->bigInteger('articleId')->unsigned()->index()->nullable();
            $table->foreign('articleId')->references('id')->on('articles')->onDelete('cascade');
            $table->text('title');
            $table->longText('description');
            $table->text('image')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_methods');
    }
}
