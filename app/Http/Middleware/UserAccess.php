<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth('api')->user()){
            return response()->json(["msg"=>'you do not have access to this page'],404);
        }else{
            $user = auth('api')->user(); // puede servir para metricas es decir conocer quienes acceden a los edpoints frecuentemte
            // error_log('User acces >'.$user);
            return $next($request);

        }


    }
}
