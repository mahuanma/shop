<?php

namespace App\Http\Middleware;

use Closure;

class checklogin
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
       if(!$request->session()->has('nameinfo')){
        return redirect()->action('user@login');
       }
        return $next($request);
    }
}
