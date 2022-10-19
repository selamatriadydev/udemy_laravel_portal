<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('above_ad');
            $table->string('above_ad_url')->nullable();
            $table->string('above_ad_status');
            $table->string('above_ad_position');
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
        Schema::dropIfExists('home_advertisements');
    }
}
