<?php

namespace App\Http\Controllers;

use Auth;           //for new sesion, pero podria ir en cors...
use Illuminate\Http\Request;
use App\Http\Requests;      //???
use App\Empleado;
use App\Http\Resources\EmpleadoResource; //as EMpleadoResource;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /*
Auth::viaRequest('custom-token', function (Request $request))
{
$token = $request->bearerToken();

}

public function inde(Request $request){
    Log::info($request->bearerToken());

}*/
                                //was empty
    public function index(Request $request)
    {
        //      //but didnt auth....
       // if(true){//Auth::check()){

            $headertoken = $request->header('Authorization');
            $token = null;

            



            //if(substr($headertoken, 0, 7) === "Bearer "){

                $token = substr($headertoken,7);
           // }                            //crashed?
           if(true)//Auth::attempt(['apiToken' => $token]))    //still buggn
           {

            /*
            if($token === null) return response()->json([
                'status' => 'error',
                'data' => 'Token empty before EMpleado List'
              ]);  //abort(401);//403 controller should only after vallidation...
            */


           // Log::debug($request->bearerToken());
           //return $header;//"something";

        $emples = Empleado::all(); //paginate(25);  //::all()

            /*
        return response()->json([
            'status' => 'success',
            'data' => 'Lista recuperada con èxito',
            'dat' => $emples
        ]);*/
        return $emples;// (json_encode($header));//$emples;
        
    
    
        }else { 
            return response()->json([
              'status' => 'error',
              'data' => 'Unauthorized Access en Empleados list'
            ]); 
          }
       // return EmpleadoResource::collection($emples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //devuelve vista de formulario para crear, restapi use STORE
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
        $empleadonuevo = Empleado::create($request->all());
        return $empleadonuevo;

        //modify tooo
      //  $emp = $request -> isMethod('put')? Empleado::findOrFail
       // (request->empleado_id) : new Empleado;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //for individual resource
    {
        //          //model
        $article = Empleado::findOrFail($id);

        return   $article; //return new empleadoresource(article) missing
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  //used store for update....
    {
       //$request::instance()->id
           // $idd->id;
           /*
                                        //this fucka always failed? 
        $empleadonuevo = Empleado::findOrFail($id)->update([
            'nombre' => $request->get('nombre'),
            'puesto'=> $request->get('puesto')
        ]

            
        );

       */
      $empleadonuevo = Empleado::where('id','=',$id)->first();
      $empleadonuevo->update([
        'nombre' => $request->get('nombre'),
        'puesto'=> $request->get('puesto')
    ]

        
    );//($request->all());
        return $empleadonuevo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
