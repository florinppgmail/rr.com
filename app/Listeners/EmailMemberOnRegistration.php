<?php

namespace App\Listeners;

use App\Events\MemberRegistered;
use App\Mail\MemberRegistered as EmailMemberRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailMemberOnRegistration
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MemberRegistered  $event
     * @return void
     */
    public function handle(MemberRegistered $event)
    {
        Mail::to($event->user)->send(new EmailMemberRegistered($event->user));
    }
}
