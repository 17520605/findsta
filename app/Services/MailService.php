<?php

namespace App\Services;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailService extends Mailable
{
    use Queueable, SerializesModels;

    public $emails = [];
    public $model;
    public $subject;
    public $signature;

    public function __construct($emails, $subject, $view, $model, $signature = null)
    {
        $this->emails = $emails;
        $this->subject = $subject;
        $this->view = $view;
        $this->model = $model;
        $this->signature = $signature;
    }

    public function build()
    {
        return $this->subject($this->subject)->view($this->view, ['model' => $this->model]);
    }

    public function sendMail(){
        \Mail::to($this->emails)->send($this);
    }
}
