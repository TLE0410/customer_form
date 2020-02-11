<?php

namespace App\Listeners;

use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;




class WelcomeCustomerListener implements ShouldQueue
{
    
    public function handle($event)
    {

        Mail::to($event->customer->email)->send(new WelcomeMail($event->customer));
    }
}
