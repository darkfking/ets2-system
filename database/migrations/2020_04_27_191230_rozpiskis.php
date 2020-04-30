<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rozpiskis extends Migration
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
            $table->string('miasto1');
            $table->string('kraj2');
            $table->string('miasto2');
            $table->string('kmpuste');
            $table->string('kmztowarem');
            $table->string('koszty');
            $table->string('paliwo');
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

