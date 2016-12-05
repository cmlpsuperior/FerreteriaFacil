<?php

namespace App\Http\Middleware;

use Closure;

//agregado:
use Illuminate\Support\Facades\Auth;
class LoginMiddleware
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
        if (Auth::User()==null) {
            return redirect('/login');
        }
        return $next($request);
    }
}
