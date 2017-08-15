<?php

namespace App\Listeners;

use App\Events\ReferralPending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ReferralPending as EmailReferralPending;
use Illuminate\Support\Facades\Mail;

class ReferralPendingBuyerNotification
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
     * @param  ReferralPending  $event
     * @return void
     */
    public function handle(ReferralPending $event)
    {
        Mail::to($event->vendor)
            ->send(new EmailReferralPending($event->vendor, $event->member, $event->referral, 'vendor'));
    }
}
