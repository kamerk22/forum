<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Utils\AppConstant;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->text('title');
            $table->text('body');
            $table->integer('comment_count')->default(AppConstant::STATUS_INACTIVE);
            $table->integer('like_count')->default(AppConstant::STATUS_INACTIVE);
            $table->integer('upvote_count')->default(AppConstant::STATUS_INACTIVE);
            $table->integer('view_count')->default(AppConstant::STATUS_INACTIVE);
            $table->tinyInteger('status')->default(AppConstant::STATUS_ACTIVE);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
