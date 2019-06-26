<?php

namespace App\Http\Middleware;

use Closure;

class checkTime
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
        $time = time();
        $sort = strtotime('9:00:00');
        $max = strtotime('22:00:00');
        if($time<$sort || $time>$max){
            return redirect('admin/list');
        }
        return $next($request);
    }
}
