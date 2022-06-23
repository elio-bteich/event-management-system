<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_options', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('min_capacity')->default(1);
            $table->integer('max_capacity')->default(1);
            $table->string('price');
            $table->foreignId('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('reservation_options');
    }
}
