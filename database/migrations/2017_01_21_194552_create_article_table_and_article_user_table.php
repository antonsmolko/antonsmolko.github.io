<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTableAndArticleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing articles
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 250)->nullable();
            $table->string('content', 100000)->nullable();
            $table->string('image_full');
            $table->string('image_thumb');
            $table->tinyInteger('published')->default(0);
            $table->string('views')->nullable();
            $table->timestamps();
        });

        // Create table for associating articles to users (Many-to-Many)
        Schema::create('article_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'article_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_user');
        Schema::dropIfExists('articles');
    }
}
