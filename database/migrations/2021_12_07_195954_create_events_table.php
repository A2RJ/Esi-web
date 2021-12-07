<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id_event', true);
            $table->integer('game_id');
            $table->integer('user_id');
            $table->string('event_name');
            $table->string('event_image');
            $table->string('slot', 10);
            $table->string('pricepool', 50);
            $table->boolean('isfree');
            $table->text('detail');
            $table->text('peraturan');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('events');
    }
}
