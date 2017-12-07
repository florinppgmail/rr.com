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
            $vendorProfile = $vendor->profile;

            if($vendorProfile->gps_lat == 0 || $vendorProfile->gps_lng == 0){
                // if the vendor profile doesn't have a
                // correct address we skip the notification
            }
            else{
                $isInRange = Range::isIn(
                    $event->referral->gps_lat, $event->referral->gps_lng,
                    $vendorProfile->gps_lat, $vendorProfile->gps_lng,
                    $vendor->range);

                if($isInRange){
                    $vendor->recommendations()->attach($event->referral->id);
                    Mail::to($vendor)->send(new ReferralRecommended($vendor, $event->referral));
                }
            }
        }
    }
}
