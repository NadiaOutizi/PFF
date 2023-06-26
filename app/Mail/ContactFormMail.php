<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $contenu;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $contenu)
    {
        $this->name = $name;
        $this->email = $email;
        $this->contenu = $contenu;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->view('contactForm')
                    ->subject('New Contact Form Submission');
    }
}
