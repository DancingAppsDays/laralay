<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //que campos pasaran llenables, se uso el faker factory sin el modelo primero...

    protected $fillable = ["nombre","puesto"];          //withouthits faileeed
}
