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
        Schema::create('user_posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('cj_users')->onDelete('cascade');
            $table->smallInteger('post_audience');
            $table->text('post_content');
            $table->smallInteger('isdeleted')->default(0);
            $table->timestamps();
        });

        Schema::create('post_images', function (Blueprint $table) {
            $table->bigIncrements('image_id');
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('post_id')->on('user_posts')->onDelete('cascade');
            $table->string('image_path');
            $table->smallInteger('isdeleted')->default(0);
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
        Schema::dropIfExists('post_images');
        Schema::dropIfExists('user_posts');
    }
};
