<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('dagination_id');
            $table->string('lat');
            $table->string('lng');
            $table->string('latLng');
            $table->integer('postal_code');
            $table->string('route');
            $table->string('country');
            $table->string('locality');
            $table->string('administrative_area_level_1');
            $table->string('administrative_area_level_2');
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
        Schema::dropIfExists('employs');
    }
}
