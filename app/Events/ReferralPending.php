<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReferralPending
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $referral, $vendor, $member;
    /**
     * Create a new event instance.
     *
     * @param $referral
     * @param $vendor
     * @param $member
     */
    public function __construct($referral, $vendor, $member)
    {
        $this->referral = $referral;
        $this->vendor = $vendor;
        $this->member = $member;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
