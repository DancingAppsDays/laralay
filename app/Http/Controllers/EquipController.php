<?php

namespace App\Http\Controllers;

use App\equip;
use Illuminate\Http\Request;

use App\Http\Requests;      //???



class EquipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emples = equip::all(); //paginate(25);  //::all()
        return $emples;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $empleadonuevo = equip::create($request->all());
        return $empleadonuevo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function show($id) //equip $equip)//this was defaulted?
    {
        //
        $article = equip::findOrFail($id);

        return   $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function edit(equip $equip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)        //ws $equip, but...
    {
        //
        $empleadonuevo = equip::where('id','=',$id)->first();
        $empleadonuevo->update([
          'nombre' => $request->get('nombre'),
          'puesto'=> $request->get('puesto')//,
          //'lastcheck'=>$request->get('lastcheck')
      ]
  
          
      );//($request->all());
          return $empleadonuevo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function destroy(equip $equip)
    {
        //
    }
}
