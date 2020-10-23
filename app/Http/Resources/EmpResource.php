<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resources;   //not suree whattodowhitthis

//API RESPONSE TEMPLATE !!

class EmpResource extends Resource
{
        //transform resoruce to array
        /**
         * @param \Illuminate\Http\Request  $request
         * @return array
         */

       //not sure if comments or actual stuff

       public function toArray($request)
       {


       // return parent::toArray($request);

       return[
        'id'=> $this->id,
        'nombre' =>$this->nombre,
        'puesto' =>$this->puesto
       ];



       }

}