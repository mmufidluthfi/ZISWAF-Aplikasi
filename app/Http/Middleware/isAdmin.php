<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->check() && $request->user()->admin == 1){
            return $next($request);
        } elseif (auth()->check() && $request->user()->admin == 2){
            return $next($request);
        } elseif (auth()->check() && $request->user()->admin == 4){
            return $next($request);
        } elseif (auth()->check() && $request->user()->admin == 3){
            return $next($request);
        } elseif (auth()->check() && $request->user()->admin == 5){
            return $next($request);
        }

        // return redirect()->guest('/login');
        return $next($request);
    }
}
