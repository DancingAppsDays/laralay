<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tester',function() {        //non worked in postmn or browser, but autoupdate ROUTE!

  //printf('this is atest of frequency instruments');
   // <dd></dd>
    error_log('fast tracks son');
    info('show some info');
    \Log::warning('something warning LOg');
});


*/
/*
Route::get('login', array(
  'uses' => 'Login@showLogin'
));
// route to process the form
Route::post('login', array(
  'uses' => 'Login@doLogin'
));
Route::get('logout', array(
  'uses' => 'Login@doLogout'
));*/


/*
Route::get('/',
function ()
  {
  return view('welcome');
  });
                      //DOEST WOK
Route::group(['prefix'=> 'auth','middleware' => 'cors'],function(){

 Route::post('Login', 'Login@login')-> middleware('cors');

  Route::post('Registro', 'AuthController@register')-> middleware('cors');
});


*/
Route::group(['middleware' => ['cors']],function(){
//rutas permitidas

      //esta era necesari antes, pero ya no....????????
Route::match(['options', 'put'],'/Login',function(){} )->middleware('cors');    //for laravel 5.4--- 5.1      //IT WORKKSSSSSS

Route::post('Login', 'AuthController@login')-> middleware('cors');
Route::post('Logout', 'AuthController@logout')-> middleware('cors');
Route::post('Registro', 'AuthController@register')-> middleware('cors');


//});
//Route::post('Login', 'Login@login')-> middleware('cors');

//Route::post('Registro', 'AuthController@register')-> middleware('cors');

//                                          WHY this is working...
Route::get('Empleado','EmpleadoController@index');//-> middleware('cors');//->middleware('auth');
Route::get('Turno','TurnosController@index')-> middleware('cors');
Route::get('Turno/{id}','TurnosController@show')-> middleware('cors');//REceives 1 id

//Route::apiResource("Maquina","EquipController");// dontttt-> middleware('cors');  

Route::get('Maquina','EquipController@index')-> middleware('cors');
Route::post('Maquina/{id}','EquipController@update')-> middleware('cors');    //DEBUGin
Route::get('Maquina/{id}','EquipController@show')-> middleware('cors'); 
//from the resource tut
//list empleados route

Route::get('Empleado','EmpleadoController@index')-> middleware('cors');

//list single
Route::get('Empleado/{id}','EmpleadoController@show')-> middleware('cors');

//create new
Route::post('Empleado','EmpleadoController@store')-> middleware('cors');
Route::post('Empleado/{id}','EmpleadoController@update')-> middleware('cors'); //update method crashed??
//uodate                                                //was crashin with store, not suported ID
//Route::put('Empleado/{id}','EmpleadoController@update');

//delete
Route::delete('Empleado','EmpleadoController@destroy');

});

/*

                    //conjunto de rutas que apunta al controller    
//Route::apiResource("Empleado","EmpleadoController");
Route::get('Turno','TurnosController@index')-> middleware('cors');
Route::get('Turno/{id}','TurnosController@show')-> middleware('cors');//REceives 1 id

//Route::apiResource("Maquina","EquipController");// dontttt-> middleware('cors');  

Route::get('Maquina','EquipController@index')-> middleware('cors');
Route::post('Maquina/{id}','EquipController@update')-> middleware('cors');    //DEBUGin
  //from the resource tut
//list empleados route

Route::get('Empleado','EmpleadoController@index')-> middleware('cors');

//list single
Route::get('Empleado/{id}','EmpleadoController@show')-> middleware('cors');

//create new
Route::post('Empleado','EmpleadoController@store')-> middleware('cors');
Route::post('Empleado/{id}','EmpleadoController@update')-> middleware('cors'); //update method crashed??
//uodate                                                //was crashin with store, not suported ID
//Route::put('Empleado/{id}','EmpleadoController@update');

//delete
Route::delete('Empleado','EmpleadoController@destroy');

