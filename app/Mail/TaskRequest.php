<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $company_name;
    public $title;
    public $description;
    public $due_date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_name, $title, $description, $due_date)
    {
        $this->company_name = $company_name;
        $this->title = $title;
        $this->description = $description;
        $this->due_date = $due_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.task-requested')->subject('New Task Requested');
    }
}
