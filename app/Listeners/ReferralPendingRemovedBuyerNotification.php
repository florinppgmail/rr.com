<?php

namespace App\Listeners;

use App\Events\ReferralRemovedFromPending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ReferralPendingRemoved as EmailReferralPendingRemoved;
use Illuminate\Support\Facades\Mail;

class ReferralPendingRemovedBuyerNotification
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
     * @param  ReferralRemovedFromPending  $event
     * @return void
     */
    public function handle(ReferralRemovedFromPending $event)
    {
        Mail::to($event->vendor)
            ->send(new EmailReferralPendingRemoved($event->vendor, $event->member, $event->referral, 'vendor'));
    }
}
