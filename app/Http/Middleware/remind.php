<?php

namespace App\Http\Middleware;

use App\Customer;
use App\Mail\RemindMail;
use Carbon\Carbon;
use Carbon\Traits\diffInMinutes;
use Closure;
use Illuminate\Broadcasting\Broadcasters\auth;
use Illuminate\Support\Facades\Mail;


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
        
        if(now()->format('H') > 17){
            return response('it time to sleep');     
        }
        return $next($request);
        
    }
}
