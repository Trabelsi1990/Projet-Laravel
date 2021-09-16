<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    //public $contact;
    public $nom;
    public $email;
    public $sujet;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$email,$sujet,$message)
    {
        $this->nom =$nom;
        $this->email=$email;
        $this->sujet = $sujet;
        $this->message = $message;

        //$this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('from@example.com')
        // ->view('emails.mail');
        return $this->markdown('emails.mail');
    }
}
