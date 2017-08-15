<?php

namespace App\Listeners;

use App\Events\ReferralBought;
use App\Mail\ReferralRecommendedBought;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ReferralBoughtBuyerNotification
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
        $referral = $event->referral;
        Mail::to($event->vendor)
            ->send(new ReferralRecommendedBought($event->vendor, $event->member, $event->referral,'vendor'));
    }
}
