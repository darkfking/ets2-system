<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rozpiski extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rozpiskis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kraj1');
            $table->string('miasto1')->nullable();
            $table->string('kraj2');
            $table->string('miasto2')->nullable();
            $table->string('kmpuste')->nullable();
            $table->string('kmztowarem')->nullable();
            $table->string('koszty')->nullable();
            $table->string('paliwo')->nullable();
            $table->string('kierowca');
            $table->string('status');
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
        Schema::drop('rozpiskis');
    }
}

