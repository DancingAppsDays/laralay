<?php

namespace App\Http\Middleware;

use Closure;

class auther
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
        $header = $request->header('Authorization');

        if(Auth::attempt(['remember_token' => $header]))
        {
            return $next($request);
            
        } else { 
            abort(401, "No tienes autorizacion para ingresar");
        }
      
  /*
        if(! $request->user()->hasRole($role)){

            abort(401, "No tienes autorizacion para ingresar");
        }
        return $next($request);*/
    }
}
