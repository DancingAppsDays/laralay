<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use Redirect;
use Auth;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\FoundationBusDispatchesJobs;
use Illuminate\RoutingController as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\AuthAccess\AuthorizesRequests;
use Illuminate\Foundation\AuthAccess\AuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;
use App\Http\Requests;  

use App\User; 
//use Validator;
use Illuminate\Support\Str;

//use Illuminate\Support\Facades\Auth; //??not sure but need auth token use aAUth

class Login extends Controller          //was only controller....
  {

    private $apiToken;

   public function __construct()
    {
    $this->apiToken = uniqid(base64_encode(Str::random(100)));
    }
    /*
  public
  function showLogin()
    {
    // Form View
    //return view('login');
      console.log("view login, from showlogin");

    }
  public
  function doLogout()
    {
    Auth::logout(); // logging out user
    return Redirect::to('login'); // redirection to login screen
    }*/
    //////
    public function logout()
    {
  
      //auth()->logout();   //?
      //Auth::logout();
  
      return response()->json(['status'=> 'success']);// 'Cerró sesión con éxito']);
    }

    public function login(Request $request){ 
        //User check

         /* 
        $userdata = array(
          'email' =>  $request->get('email'),
          'password' =>$request->get('password')
          //'email' => Input::get($request->email),       //FATAL
          //'password' => Input::get($request->password)
        );*/
          /*
        if(false)//Auth::attempt($userdata,true))
        {
          return response()->json([
            'status' => 'success',
            'data' => $request->get('email'),   //yeag we getting it
            ]); 
        }*/
                                                  //was missing get
        if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
        {
          
          $user = Auth::user(); 
        //Setting login response 
        $success['token'] = $this->apiToken;      //sends error wihtout token
        $success['name'] =  $user->name;
          return response()->json([
            'status' => 'success',
            'data' => $success
          ]); 
        } else { 
          return response()->json([
            'status' => 'error',
            'data' => 'Unauthorized Access'
          ]); 
        }
      }
    }

    /*
  public
  function doLogin()
    {
    // Creating Rules for Email and Password
    $rules = array(
      'email' => 'required|email', // make sure the email is an actual email
      'password' => 'required|alphaNum|min:8' //, ?? no coma

      // password has to be greater than 3 characters and can only be alphanumeric and);
      // checking all field


      //$validator = Validator::make(Input::all() , $rules);
      
      // if the validator fails, redirect back to the form
      //if (1 == 2)//$validator->fails())
        {
        return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {
        // create our user data for the authentication
        $userdata = array(
          'email' => Input::get('email') ,
          'password' => Input::get('password')
        )



        // attempt to do the login
        if (Auth::attempt($userdata))
          {
          // validation successful
          // do whatever you want on success
          }
          else
          {
          // validation not successful, send back to form
          return Redirect::to('checklogin');
          }
        //}
      }*/
    