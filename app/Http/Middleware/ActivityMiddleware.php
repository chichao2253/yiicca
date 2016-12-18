<?php

namespace App\Http\Middleware;

use Closure;

class ActivityMiddleware
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
    	if(time()<strtotime('2016-12-14')){
    		return redirect('activity0');
    	}
        return $next($request);
    } 
}
