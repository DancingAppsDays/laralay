<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;      //???
use App\Turnodetalle;

class TurnosController extends Controller
{
    public function index()
    {
        //

        $emples = Turnodetalle::all(); //paginate(25);  //::all()
        return $emples;

       // return EmpleadoResource::collection($emples);
       //$empleadonuevo = equip::where('id','=',$id)->first();
    }
    public function show($id) //for individual resource
    {
        //          //model
        $article = Turnodetalle::where('idempleado','=',$id)->get();

        return   $article; //return new empleadoresource(article) missing
    }
}
