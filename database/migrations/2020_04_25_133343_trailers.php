<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trailers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa')->nullable();
            $table->string('nr')->nullable();
            $table->string('rok')->nullable();
            $table->string('typ')->nullable();
            $table->string('przebieg')->nullable();
            $table->string('data')->nullable();
            $table->string('kierowca')->nullable();
            $table->string('link')->nullable();
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
        Schema::drop('trailers');
    }
}
