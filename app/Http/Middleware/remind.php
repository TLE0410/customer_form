<?php

namespace App\Http\Middleware;

use Closure;
use App\Customer;


class remind
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
        if(now()->format('H') > 22){
            return response('it time to sleep');     
        }
        return $next($request);
        
    }
}
