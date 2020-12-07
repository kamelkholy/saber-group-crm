<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Client
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
        if(Auth::user()->user_type != 2){
            return redirect('/')->withErrors([
                'message' => 'Not Allowed']);
        }
        else{
           return $next($request); 
        }
    }
}
