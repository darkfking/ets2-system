<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Firms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumtext('regulamin');
            $table->string('mody');
            $table->mediumtext('poradniki');
            $table->mediumtext('koszty');
            $table->double('konto');
            $table->double('kilometry');
            $table->double('paliwo');
            $table->float('stawkapusta');
            $table->float('stawkaladunek');
            $table->float('stawkafirma');
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
        Schema::drop('firms');
    }
}

