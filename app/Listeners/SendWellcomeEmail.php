<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WellcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendWellcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        Mail::send(new WellcomeMail($event->email));
        
    }
}
