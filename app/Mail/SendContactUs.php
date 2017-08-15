<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactUs extends Mailable
{
    use Queueable, SerializesModels;

    protected $post;

    /**
     * Create a new message instance.
     *
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@ryansreferrals.com')
            ->subject('RyansReferrals - New message from Contact Us form')
            ->view('emails.contactus')
            ->with(
                [
                    'n' => $this->post['name'],
                    's' => $this->post['subject'],
                    'm'  => $this->post['message'],
                ]);
    }
}
