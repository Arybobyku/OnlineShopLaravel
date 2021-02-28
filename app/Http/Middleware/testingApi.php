<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class testingApi
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
        if($request->header('Token') != 'bobykerenkali')
        {
                return response()->json(['message'=>'Token Dosnt Valid'],401);
        }
        return $next($request);
    }
}
