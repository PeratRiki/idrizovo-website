<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMessage extends Mailable
{
    use Queueable, SerializesModels;

    public string $body;

    public function __construct(string $subject, string $body)
    {
        $this->subject($subject);
        $this->body = $body;
    }

    public function build()
    {
        return $this->view('emails.admin-message')
                    ->text('emails.admin-message-text');
    }
}
