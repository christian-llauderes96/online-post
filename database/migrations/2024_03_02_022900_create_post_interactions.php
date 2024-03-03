<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Likes table
        Schema::create('post_likes', function (Blueprint $table) {
            $table->bigIncrements('like_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('cj_users')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('user_posts')->onDelete('cascade');
            $table->timestamps();
        });

        // Comments table
        Schema::create('post_comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->text('comment_content');
            $table->foreign('user_id')->references('user_id')->on('cj_users')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('user_posts')->onDelete('cascade');
            $table->timestamps();
        });

        // Shares table
        Schema::create('post_shares', function (Blueprint $table) {
            $table->bigIncrements('share_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('cj_users')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('user_posts')->onDelete('cascade');
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
        Schema::dropIfExists('post_likes');
        Schema::dropIfExists('post_comments');
        Schema::dropIfExists('post_shares');
    }
};
