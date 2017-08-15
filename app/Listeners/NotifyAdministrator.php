<?php

namespace App\Listeners;

use App\Events\MemberPaymentRequested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdministrator
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
     * @param  MemberPaymentRequested  $event
     * @return void
     */
    public function handle(MemberPaymentRequested $event)
    {
        //
    }
}
