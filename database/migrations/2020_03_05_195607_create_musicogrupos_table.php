<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMusicogruposTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicogrupos', function (Blueprint $table) {
            $table->integer('idgrupo')->unsigned();
            $table->integer('idmusico')->unsigned();
            $table->longText('instrumento');
            $table->date('fechanacimiento');
            $table->date('fechamuerte');
            $table->foreign('idgrupo')->references('id')->on('grupos');
            $table->foreign('idmusico')->references('id')->on('musico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('musicogrupos');
    }
}
