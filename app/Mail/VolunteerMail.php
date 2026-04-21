<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VolunteerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Volunteer Application from ' . $this->data['name'])
                    ->replyTo($this->data['email'], $this->data['name'])
                    ->view('emails.volunteer')
                    ->with('data', $this->data);
    }
}
