<?php

namespace App\Listeners;

use App\Events\ReferralPending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MarkReferralAsPending
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
     * @param  ReferralPending  $event
     * @return void
     */
    public function handle(ReferralPending $event)
    {
        $event->referral->pending = 1;
        $event->referral->save();
    }
}
