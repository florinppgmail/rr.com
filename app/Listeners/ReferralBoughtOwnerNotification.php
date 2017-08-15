<?php

namespace App\Listeners;

use App\Events\ReferralBought;
use App\Mail\ReferralRecommendedBought;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ReferralBoughtOwnerNotification
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
     * @param  ReferralBought  $event
     * @return void
     */
    public function handle(ReferralBought $event)
    {
        Mail::to($event->member)
            ->send(new ReferralRecommendedBought($event->vendor, $event->member, $event->referral, 'member'));
    }
}
