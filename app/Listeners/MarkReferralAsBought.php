<?php

namespace App\Listeners;

use App\Events\ReferralBought;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MarkReferralAsBought
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
        $event->referral->sold_with = Cache::get('settings_referral_price');
        $event->referral->sold = 1;
        $event->referral->sold_at =  Carbon::now()->format('Y-m-d H:i:s');
        $event->referral->sell_details = serialize($event->paymentData);
        $event->referral->save();
    }
}
