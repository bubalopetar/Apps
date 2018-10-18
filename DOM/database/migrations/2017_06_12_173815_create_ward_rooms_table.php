<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward_rooms', function (Blueprint $table) {
            $table->integer('Ward_id')->unsigned();
            $table->foreign('Ward_id')->references('id')->on('wards');
            $table->integer('Room_id')->unsigned();
            $table->foreign('Room_id')->references('id')->on('rooms');
            $table->primary(['Ward_id','Room_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ward_rooms');
    }
}
