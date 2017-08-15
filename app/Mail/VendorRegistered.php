<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendorRegistered extends Mailable
{
    use Queueable, SerializesModels;
    protected $vendor;

    /**
     * Create a new message instance.
     *
     * @param $vendor
     */
    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@ryansreferrals.com')
            ->subject('RyansReferrals.com - Welcome')
            ->view('emails.registration.vendor')
            ->with(
                [
                    'user'  => $this->vendor,
                ]);
    }
}
