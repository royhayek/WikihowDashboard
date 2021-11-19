<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleMethodPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_method_parts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('articleId')->unsigned()->index()->nullable();
            $table->foreign('articleId')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('part')->default(1);
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_method_parts');
    }
}
