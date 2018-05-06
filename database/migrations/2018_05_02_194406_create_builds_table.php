<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('processor_id');
            $table->foreign('processor_id')->references('id')->on('processors');
            $table->unsignedInteger('motherboard_id');
            $table->foreign('motherboard_id')->references('id')->on('motherboards');
            $table->unsignedInteger('memory_id');
            $table->foreign('memory_id')->references('id')->on('memories');
            $table->unsignedInteger('graphics_id');
            $table->foreign('graphics_id')->references('id')->on('graphics');
            $table->unsignedInteger('storage_id');
            $table->foreign('storage_id')->references('id')->on('storages');
            $table->unsignedInteger('optical_id');
            $table->foreign('optical_id')->references('id')->on('opticals');
            $table->unsignedInteger('tower_id');
            $table->foreign('tower_id')->references('id')->on('towers');
            $table->unsignedInteger('power_id');
            $table->foreign('power_id')->references('id')->on('powers');
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
        Schema::dropIfExists('builds');
    }
}
