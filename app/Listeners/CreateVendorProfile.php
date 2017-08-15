<?php

namespace App\Listeners;

use App\Events\VendorRegistered;
use App\Http\Middleware\Vendor;
use App\Models\VendorProfile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateVendorProfile
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
     * @param  VendorRegistered  $event
     * @return void
     */
    public function handle(VendorRegistered $event)
    {
        $profile = new VendorProfile();

        $profile->user_id = $event->user->id;
        $profile->save();
    }
}
