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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ranga');
            $table->string('ciezarowka');
            $table->string('naczepa');
            $table->string('konto');
            $table->string('kilometry');
            $table->string('paliwo');
            $table->string('going');
            $table->string('skandynawia');
            $table->string('france');
            $table->string('italia');
            $table->string('baltic');
            $table->string('blacksea');
            $table->string('promods');
            $table->string('rusmapa');
            $table->rememberToken();
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
