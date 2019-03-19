<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewClient extends Mailable
{
    use Queueable, SerializesModels;
    public $first_name;
    public $client_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $client_id)
    {
        $this->first_name = $first_name;
        $this->client_id = $client_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome-client')->subject('Welcome to SunnyChopper Media');
    }
}
