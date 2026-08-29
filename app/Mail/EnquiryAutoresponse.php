<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryAutoresponse extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Enquiry $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your enquiry — Criticom Solutions',
            replyTo: [
                new Address('support@criticom.net', 'Criticom Solutions'),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enquiry-autoresponse',
            text: 'emails.enquiry-autoresponse-text',
        );
    }
}
