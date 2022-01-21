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
            $table->integer('id_user', true);
            $table->enum('user_role', ['player', 'management', 'admin']);
            $table->string('uuid')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('password');
            $table->string('kontak', 15);
            $table->string('alamat');
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->string('village');
            $table->string('kartu_identitas')->nullable();
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
