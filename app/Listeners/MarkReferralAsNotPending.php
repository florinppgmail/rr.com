<?php

namespace App\Listeners;

use App\Events\ReferralRemovedFromPending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MarkReferralAsNotPending
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
     * @param  ReferralPendingRemoved  $event
     * @return void
     */
    public function handle(ReferralRemovedFromPending $event)
    {
        $event->referral->pending = 0;
        $event->referral->save();
    }
}
