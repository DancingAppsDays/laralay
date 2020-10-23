<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use App\User; 
use Validator;
use Illuminate\Support\Str;

use App\Http\Requests;      //???
//use App\Empleado;

class AuthController extends Controller 
{
  
   private $apiToken;

   public function __construct()
    {
    $this->apiToken = uniqid(base64_encode(Str::random(100)));
    }
  /** 
   * Register API 
   * 
   * @return \Illuminate\Http\Response 
   */ 

   //rooll key 
   public function rollnewkey()
   {
    do{ $this->apiToken = str_random(100);

    }while($this->where('remember_token', $this->apitoken)->exist());
    $this->save();
    
   }

   public function login(Request $request){ 

   if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
   {
     
     $user =auth()->user();// Auth::user(); //auth()->user();
   //Setting login response 
   $success['token'] = $this->apiToken;      //sends error wihtout token
   $success['name'] =  $user->name;

  
   //$user->update(['remember_token' => $success['token']]);
   $user->update([
    'apiToken' => $this->apiToken]//$success['token']]
   //$user->update(['remember_token' => 'laralaralralra',
      //           'apiToken'=>$success['name']]
  );

     return response()->json([
       'status' => 'success',
       'data' => $success
     ]); 


   } else {   //authlogin fauled
     return response()->json([    //(['error' => 'Email or password does\'t exist'], 401);
       'status' => 'error',
       'data' => 'Unauthorized Access',
       'error' => 'Email y password no coinciden', 401
     ]); 
   }
  }

  public function register(Request $request) 
  { 
    /*
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'email' => 'required|email', 
      'password' => 'required', 
      
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()]);
    }*/
    $postArray = $request->all(); 
   
    $postArray['password'] = bcrypt($postArray['password']);      //withoutthis auth faileeeed1!!
    
    
    
    $user = User::create($postArray); 
    
    Auth::login($user,true);    //autenticate new user instance....

    $success['token'] = $this->apiToken;  
    $success['name'] =  $user->name;

    $user->update([     'remember_token' => $sucess['token']   ]);


    return response()->json([
      'status' => 'success',
      'data' => $success,
    ]); 
  }


      //invalidate token?
  public function logout()
  {

    //auth()->logout();   //?
    Auth::logout();

    return response()->json(['status'=> 'success']);// 'Cerró sesión con éxito']);
  }
}