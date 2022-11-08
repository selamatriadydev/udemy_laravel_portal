<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('news_tranding_total')->default(0);
            $table->string('news_tranding_status')->default('Hide');
            $table->integer('video_total')->default(0);
            $table->string('video_status')->default('Hide');
            $table->text('favicon')->nullable();
            $table->text('logo')->nullable();
            $table->string('top_bar_date_status')->default('Hide');
            $table->text('top_bar_email')->nullable();
            $table->string('top_bar_email_status')->default('Hide');
            $table->text('theme_color_1')->nullable();
            $table->text('theme_color_2')->nullable();
            $table->text('analytic_id')->nullable();
            $table->string('analytic_id_status')->default('Hide');
            $table->text('disqus_code')->nullable();
            $table->string('disqus_status')->default('Hide');
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
        Schema::dropIfExists('front_settings');
    }
}
