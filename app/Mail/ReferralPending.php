<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralPending extends Mailable
{
    use Queueable, SerializesModels;

    protected $vendor, $member, $referral, $userType;

    /**
     * Create a new message instance.
     *
     * @param $vendor
     * @param $member
     * @param $referral
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
                    ->subject('RyansReferrals.com - Referral pending')
                    ->view('emails.referrals.pending.member')
                    ->with(
                        [
                            'vendor'  => $this->vendor,
                            'member'  => $this->member,
                            'referral'  => $this->referral,
                        ]);
                break;
            case 'vendor':
                return $this->from('no-reply@ryansreferrals.com')
                    ->subject('RyansReferrals.com - Referral pending')
                    ->view('emails.referrals.pending.vendor')
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
