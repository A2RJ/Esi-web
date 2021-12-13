<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestSquadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_squads', function (Blueprint $table) {
            $table->integer('id_request_squad', true);
            $table->integer('player_id');
            $table->integer('squad_id');
            $table->boolean('status');
            $table->date('created_at')->default('CURRENT_TIMESTAMP');
            $table->date('updated_at')->default('CURRENT_TIMESTAMP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_squads');
    }
}
