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
        
        $time = new Carbon(auth()->user()->lastTimeLogin->last_time);
        if ($time->diffInMinutes(now()) > 1) {
            Mail::to(auth()->user()->email)->send(new RemindMail());
            auth()->user()->lastTimeLogin()->update([
                'last_time' => Carbon::now()->toDateTimeString(),
                
            ]);
        }
        if(now()->format('H') > 22){
            return response('it time to sleep');     
        }
        return $next($request);
        
    }
}
