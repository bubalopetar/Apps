<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventar_times', function (Blueprint $table) {
            $table->integer('inventar_id')->unsigned();
            $table->foreign('inventar_id')->references('id')->on('inventars');
            $table->dateTime('date');
            //$table->integer('time_id')->unsigned();
            //$table->foreign('time_id')->references('id')->on('times');
           // $table->primary(['inventar_id','time_is']);
            $table->primary(['inventar_id','date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventar_times');
    }
}
