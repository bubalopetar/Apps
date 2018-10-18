<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->date('dat_rođenja');
            $table->string('adress',255);
            $table->string('kontakt',64);
            $table->string('oib',255);
            $table->string('br_sobe',255)->default('Nije unešeno');
            $table->string('br_zdravstvene',255)->default('Nije unešeno');
            $table->string('profile_picture')->default('default.jpg');
            $table->string('map_name')->default('Nije unešeno');
            $table->string('terapija',2048);
            $table->string('stvari',2048)->default('Nije unešeno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wards');
    }
}
