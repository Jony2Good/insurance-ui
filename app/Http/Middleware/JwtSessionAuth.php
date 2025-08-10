<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtSessionAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {                
        $token = $request->cookie('access_token');        
       
        if (!$token) {
            $token = $request->bearerToken();
        }
       
        if (!$token && $request->input('access_token')) {
            $token = $request->input('access_token');
        }

        if (!$token) {
            abort(401, 'Unauthorized: token not provided');
        }

        try {           
            JWTAuth::setToken($token)->authenticate();
        } catch (JWTException $e) {
            abort(401, 'Unauthorized: invalid token');
        }
      
        return $next($request);
    }
}
