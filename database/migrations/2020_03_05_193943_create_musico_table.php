<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMusicoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musico', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('nombre');
            $table->longText('apellido');
            $table->longText('instrumento');
            $table->date('fechanacimiento');
            $table->date('fechamuerte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('musico');
    }
}
