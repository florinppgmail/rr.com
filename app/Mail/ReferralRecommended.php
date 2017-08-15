<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralRecommended extends Mailable
{
    use Queueable, SerializesModels;

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
            ->subject('RyansReferrals.com - New recommendation')
            ->view('emails.referrals.recommendation')
            ->with(
                [
                    'vendor'  => $this->vendor,
                    'referral' => $this->referral
                ]);
    }
}
