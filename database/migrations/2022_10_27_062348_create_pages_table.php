<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('about_title')->nullable();
            $table->text('about_detail')->nullable();
            $table->text('about_status')->nullable();
            $table->text('faq_title')->nullable();
            $table->text('faq_detail')->nullable();
            $table->text('faq_status')->nullable();
            $table->text('contact_title')->nullable();
            $table->text('contact_detail')->nullable();
            $table->text('contact_status')->nullable();
            $table->text('contact_map')->nullable();
            $table->text('terms_title')->nullable();
            $table->text('terms_detail')->nullable();
            $table->text('terms_status')->nullable();
            $table->text('privacy_title')->nullable();
            $table->text('privacy_detail')->nullable();
            $table->text('privacy_status')->nullable();
            $table->text('disclaimer_title')->nullable();
            $table->text('disclaimer_detail')->nullable();
            $table->text('disclaimer_status')->nullable();
            $table->text('login_title')->nullable();
            $table->text('login_status')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
