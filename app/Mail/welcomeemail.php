<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class welcomeemail extends Mailable
{
    use Queueable, SerializesModels;

    // public $mailmessage;
    // public $subject;

    public $request;
    public $fileName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $fileName)
    {
        // $this->mailmessage = $message;
        // $this->subject = $subject;

        $this->request = $request;
        $this->fileName = $fileName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "New Registration",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.welcomemail',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        // return $this->from('parthamondal954@gmail.com')
        //     ->markdown('mail.welcomemail')
        //     // ->subject('Hi, ' . $this->subject)
        //     ->subject('Partha Mondal')
        //     ->with(['data' => $this->mailmessage]);

        // return $this->from('parthamondal954@gmail.com')
        //     ->markdown('mail.welcomemail')
        //     // ->subject('Hi, ' . $this->subject)
        //     ->subject('New User Register')
        //     ->with(['data' => $this->request]);
    }

    public function attachments(): array
    {
        $attachments = [];

        if ($this->fileName) {
            $attachments = [
                Attachment::fromPath(public_path('/uploads/' . $this->fileName))
            ];
        }
        return $attachments;
    }
}