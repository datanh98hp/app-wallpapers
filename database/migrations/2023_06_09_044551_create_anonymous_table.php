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
        Schema::create('anonymous', function (Blueprint $table) {
            $table->id();
            $table->string('device_code');
            $table->string('name');
            $table->string('sex');
            $table->string('verify_code');
            $table->string('access_time')->nullable();
            $table->string('dateOfBirth');
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
        Schema::dropIfExists('anonymous');
    }
};
