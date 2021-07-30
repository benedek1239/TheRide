<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_rides', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('start_city_id');
            $table->integer('finish_city_id');
            $table->integer('notified');
            $table->timestamps();
            $table->dateTime('start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('required_rides');
    }
}
