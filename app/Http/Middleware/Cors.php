<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {

        //header("Access-Control-Allow-Origin: *");

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];
       // if($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
        //    return Response::make('OK', 200, $headers);
        //}

        //$response = $next($request);
        foreach($headers as $key => $value)
            $request->header($key, $value);
        return $next($request);
    }


/*
        return $request
            ->header('Access-Control-Allow-Origins', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
           
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');//, Accept, Authorization, X-Requested-With, Application');
    */
    
       // }//}
    /*
               //WAS WORKING?????!?!??!?!?!?!?!?!??!
    public function handle($request, Closure $next)
    {
        
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*')  //was wildcard *
        ->header('Access-Control-Allow-Methods','GET, POST, PUT, DELETE, OPTIONS')
        //header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        ->header('Access-Control-Allow-Headers','*');//'Origin, Content-Type, X-Auth-Token');



        $headers = [ 'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' =>   'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' =>'Content-Type, X-Auth-Token, Origin, Authorization'// Accept, Authorization, X-Requested-With, 
        //'Access-Control-Allow-Origin' => '*'

             ];
             foreach ($headers as $key => $value)
        $request->headers->set($key,$value);
        return $next($request);
        
/*
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*')  //was wildcard *
        ->header('Access-Control-Allow-Methods','GET, POST, PUT, DELETE, OPTIONS')
        //->header('Access-Control-Allow-Credentials', 'true')
        //header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        ->header('Access-Control-Allow-Headers','*');//'Origin, Content-Type, X-Auth-Token');*/
    //}
    
    /*
        if($request->getMethod() == 'OPTIONS'){
    
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
            header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key, Authorization');
            header('Access-Control-Allow-Credentials: true');
            exit(0);
        }
        return $next($request);
    }*/
}
/*
    public function handle($request, Closure $next)
    {
        return $next($request)
        //Url a la que se le dará acceso en las peticiones
       ->header("Access-Control-Allow-Origin", '*')//http://urlfronted.example")
       //Métodos que a los que se da acceso
       ->header("Access-Control-Allow-Methods", 'GET, POST, PUT, DELETE, OPTIONS')
       //Headers de la petición
       ->header("Access-Control-Allow-Headers", '*');//"X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 
   
        
        
        /*$headers = [ 'Access-Control-Allow-Methods' =>  'GET, POST, PUT, PATCH, DELETE, OPTIONS',
        'Access-Control-Allow-Headers' =>'Content-Type, X-Auth-Token, Origin, Authorization'// Accept, Authorization, X-Requested-With, 


             ];*/

                //manda todo vacio
/*
    if ($this->cors->isPreflightRequest($request)) {
        $response = $this->cors->handlePreflightRequest($request);

        $this->cors->varyHeader($response, 'Access-Control-Request-Method');

        return $response;
    }
        */
        //return $next($request);
        /*
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*')  //was wildcard *
        ->header('Access-Control-Allow-Methods','GET, POST, PUT, DELETE, OPTIONS')
        //header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        ->header('Access-Control-Allow-Headers','*');//'Origin, Content-Type, X-Auth-Token');

        //->header('Access-Control-Allow-Credentials', 'true');      //this might ghost crash everythin
       */

/*
$response =  $next($request);
//foreach ($headers as $key => $value)
                                                //$response->header($key,$value); 
   //     $response->headers->set($key,$value);

$response->headers->set('Access-Control-Allow-Origin', '*');
$response->headers->set('Access-Control-Allow-Methods','*');//'GET, POST, PUT, DELETE,OPTIONS');
$response->headers->set('Access-Control-Allow-Headers','Content-Type, Accept, Authorization, X-Requested-With, Application,X-Auth-Token','ip');//Origin, Content-Type, X-Auth-Token');
//$response->headers->set('Access-Control-Allow-Credentials', 'true');
return $response;
*/
        //}



//}
