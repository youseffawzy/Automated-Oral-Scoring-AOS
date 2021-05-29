<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        /*$token = $request->header('APP_KEY');
        if($token !='AOS')
        {
            return response()->json(['message'=>'aapp key not found'],401);
        }*/
        return $next($request);
    }
}
