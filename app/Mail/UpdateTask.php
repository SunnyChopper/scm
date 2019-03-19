<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateTask extends Mailable
{
    use Queueable, SerializesModels;
    public $first_name;
    public $title;
    public $description;
    public $status;
    public $due_date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $title, $description, $status, $due_date)
    {
        $this->first_name = $first_name;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->due_date = $due_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-task')->subject('New Task - SunnyChopper Media');
    }
}
