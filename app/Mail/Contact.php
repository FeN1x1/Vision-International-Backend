<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $info;
    public $details;
    
    /**
     * @return void
     */
    public function __construct($details, $subject)
    {
        $this->details = $details;
        $this->subject = $subject;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
        ->view('mail.contact');
    }
}
