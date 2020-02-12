<?php

namespace App\Listeners;

use App\Mail\RemindMail;
use Carbon\Carbon;
use Carbon\Traits\diffInMinutes;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (auth()->user()) {
            $time = new Carbon(auth()->user()->lastTimeLogin->last_time->get());
            if ($time->diffInHours(now()) > 24) {
                Mail::to(auth()->user()->email)->send(new RemindMail());
                auth()->user()->lastTimeLogin()->update([
                    'last_time' => Carbon::now()->toDateTimeString(),
                    
                ]);
            }
        }
    }
}
