<?php

namespace App\Listeners;

use App\Events\MemberRegistered;
use App\Models\MemberProfile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateMemberProfile
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
     * @param  MemberRegistered  $event
     * @return void
     */
    public function handle(MemberRegistered $event)
    {
        $profile = new MemberProfile();

        $profile->user_id = $event->user->id;
        $profile->save();
    }
}
