<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equips', function (Blueprint $table) {

            $table->engine = 'InnoDB';  //para FK referencials//NOTTested
            $table->increments('id');
            $table->string('nombre');//->unique(); //nullable
            $table->string('puesto');
            $table->string('lastcheck');//->unique(); //nullable
            $table->decimal('riskfactor',1,0);
            $table->timestamps();
        });
    }               //table->integer('categoriaID')->unsigned()      //increments pK of other table
              //define as      //table->foreign('categoruaID)->references('id')-> on('mi otra clase')
                                        //onDelete('set null');
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equips');
    }
}
