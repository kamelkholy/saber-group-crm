<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Moderation
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
        if(Auth::user()->user_type == 3 || Auth::user()->user_type == 5){
            return $next($request);
        }
        else{
             return redirect('/')->withErrors([
                'message' => 'Not Allowed']); 
        }
    }
}
