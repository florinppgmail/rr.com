<?php

namespace App\Listeners;

use App\Events\ReferralAdded;
use App\Helpers\Range;
use App\Mail\ReferralRecommended;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotifyInterestedVendors
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
     * @param  ReferralAdded  $event
     * @return void
     */
    public function handle(ReferralAdded $event)
    {
        $vendors = $event->referral->category->vendors()->get();

        foreach ($vendors as $vendor){
            $isInRange = Range::isIn(
                $event->referral->gps_lat, $event->referral->gps_lng,
                $vendor->profile->gps_lat, $vendor->profile->gps_lng,
                $vendor->range);

            if($isInRange){
                $vendor->recommendations()->attach($event->referral->id);
                Mail::to($vendor)->send(new ReferralRecommended($vendor, $event->referral));
            }

        }
    }
}
