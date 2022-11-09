<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('sub_category_id');
            $table->string('post_title');
            $table->text('post_detail');
            $table->string('post_photo');
            $table->integer('visitor')->default(1);
            $table->integer('author_id')->default(0);
            $table->integer('admin_id')->default(0);
            $table->integer('is_share')->default(0);
            $table->integer('is_comment')->default(0);
            $table->integer('is_publish')->default(0);
            $table->integer('language_id');
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
        Schema::dropIfExists('posts');
    }
}
