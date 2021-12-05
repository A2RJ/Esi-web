<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_user')->primary();
            $table->enum('user_role', ['player', 'management', 'admin']);
            $table->string('email');
            $table->string('password');
            $table->string('kontak', 15);
            $table->string('alamat');
            $table->enum('gender', ['l', 'p']);
            $table->string('user_image');
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
        Schema::dropIfExists('users');
    }
}
