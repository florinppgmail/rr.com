<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralRecommendedPendingRemoval extends Mailable
{
    use Queueable, SerializesModels;

    protected $vendor, $referral;

    /**
     * Create a new message instance.
     *
     * @param $vendor
     * @param $referral
     */
    public function __construct($vendor, $referral)
    {
        $this->vendor = $vendor;
        $this->referral = $referral;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@ryansreferrals.com')
            ->subject('RyansReferrals.com - Referral removed from pending')
            ->view('emails.referrals.pendingremoval')
            ->with(
                [
                    'vendor'  => $this->vendor,
                    'referral'  => $this->referral,
                ]);
    }
}
