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
        Schema::create('user_like_wallpaper', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anonymous_id')->nullable();;
            $table->foreign('anonymous_id')->references('id')->on('anonymous');
            $table->unsignedBigInteger('wallpaper_id')->nullable();
            $table->foreign('wallpaper_id')->references('id')->on('wallpapers');
            
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
        Schema::dropIfExists('user_like_wallpaper');
    }
};
