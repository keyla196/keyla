<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGenerosgruposTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generosgrupos', function (Blueprint $table) {
            $table->integer('idgrupos')->unsigned();
            $table->integer('idgenero')->unsigned();
            $table->timestamps();
            $table->foreign('idgrupos')->references('id')->on('gurpos');
            $table->foreign('idgenero')->references('id')->on('general');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('generosgrupos');
    }
}
