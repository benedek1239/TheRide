<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('overpass_id');
            $table->string('type');
            $table->integer('county_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('postal_code');
            $table->string('name_hu');
            $table->string('name_en');
            $table->string('name_ro');
            $table->string('county');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
