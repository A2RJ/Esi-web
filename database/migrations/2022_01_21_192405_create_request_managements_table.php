<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_managements', function (Blueprint $table) {
            $table->integer('id_request_management', true);
            $table->integer('squad_id');
            $table->integer('management_id');
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('request_managements');
    }
}
