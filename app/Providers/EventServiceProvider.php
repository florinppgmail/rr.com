<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\SettingsChanged' => [
            'App\Listeners\RefreshCachedSettings',
        ],
        // REGISTRATION
        'App\Events\VendorRegistered' => [
            'App\Listeners\CreateVendorProfile',
            'App\Listeners\EmailVendorOnRegistration',
        ],
        'App\Events\MemberRegistered' => [
            'App\Listeners\CreateMemberProfile',
            'App\Listeners\EmailMemberOnRegistration',
        ],
        // REFERRALS
        'App\Events\ReferralAdded' => [
            'App\Listeners\NotifyInterestedVendors',
        ],
        'App\Events\ReferralBought' => [
            'App\Listeners\MarkReferralAsBought',
            'App\Listeners\ReferralBoughtOwnerNotification',
            'App\Listeners\ReferralBoughtBuyerNotification',
        ],
        'App\Events\ReferralPending' => [
            'App\Listeners\MarkReferralAsPending',
            'App\Listeners\ReferralPendingOwnerNotification',
            'App\Listeners\ReferralPendingBuyerNotification',
        ],
        'App\Events\ReferralRemovedFromPending' => [
            'App\Listeners\MarkReferralAsNotPending',
            'App\Listeners\ReferralPendingRemovedOwnerNotification',
            'App\Listeners\ReferralPendingRemovedBuyerNotification',
        ],

        // PAYMENTS
        'App\Events\MemberPaymentRequested' => [
            'App\Listeners\NotifyAdministrator',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
