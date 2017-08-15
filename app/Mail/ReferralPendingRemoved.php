<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralPendingRemoved extends Mailable
{
    use Queueable, SerializesModels;

    protected $vendor, $referral, $member, $userType;

    /**
     * Create a new message instance.
     *
     * @param $vendor
     * @param $referral
     * @param $member
     * @param $userType
     */
    public function __construct($vendor, $member, $referral, $userType)
    {
        $this->vendor = $vendor;
        $this->member = $member;
        $this->referral = $referral;
        $this->userType = $userType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch($this->userType){
            case 'member':
                return $this->from('no-reply@ryansreferrals.com')
                    ->subject('RyansReferrals.com - Referral pending removal')
                    ->view('emails.referrals.pending.removal.member')
                    ->with(
                        [
                            'vendor'  => $this->vendor,
                            'member'  => $this->member,
                            'referral'  => $this->referral,
                        ]);
                break;
            case 'vendor':
                return $this->from('no-reply@ryansreferrals.com')
                    ->subject('RyansReferrals.com - Referral pending removal')
                    ->view('emails.referrals.pending.removal.vendor')
                    ->with(
                        [
                            'vendor'  => $this->vendor,
                            'member'  => $this->member,
                            'referral'  => $this->referral,
                        ]);
                break;
        }
    }
}
