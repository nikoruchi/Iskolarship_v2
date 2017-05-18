<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isSponsor
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
        if(Auth::check() && Auth::user()->user_type != 'sponsor'){
            return redirect('/');
        }
        return $next($request);    

    }
}
