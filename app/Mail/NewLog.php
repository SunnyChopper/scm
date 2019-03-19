<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewLog extends Mailable
{
    use Queueable, SerializesModels;
    public $first_name;
    public $title;
    public $description;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $title, $description)
    {
        $this->first_name = $first_name;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-log')->subject('New Update from SunnyChopper Media');
    }
}
