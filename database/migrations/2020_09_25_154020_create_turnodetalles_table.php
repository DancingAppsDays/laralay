<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnodetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnodetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            $table->date('fecha');
            $table->timestamps();
        });
    }
    //table->integer('categoriaID')->unsigned()      //increments pK of other table
              //define as      //table->foreign('categoruaID)->references('id')-> on('mi otra clase')
                                        //onDelete('set null');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnodetalles');
    }
}
