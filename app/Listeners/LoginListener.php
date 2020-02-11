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
        $time = new Carbon(auth()->user()->lastTimeLogin->last_time);
        if ($time->diffInMinutes(now()) > 10) {
            Mail::to(auth()->user()->email)->send(new RemindMail());
        }
    }
}
