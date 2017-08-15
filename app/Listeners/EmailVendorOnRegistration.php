<?php

namespace App\Listeners;

use App\Events\VendorRegistered;
use App\Mail\VendorRegistered as EmailVendorRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailVendorOnRegistration
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
     * @param  VendorRegistered  $event
     * @return void
     */
    public function handle(VendorRegistered $event)
    {
        Mail::to($event->user)->send(new EmailVendorRegistered($event->user));
    }
}
