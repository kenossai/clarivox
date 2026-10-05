<?php

namespace App\Mail;

use App\Models\Site;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactFormMail extends Mailable
{
  /**
   * @param  array{name:string,email:string,phone:?string,message:string}  $data
   */
  public function __construct(public readonly Site $site, public readonly array $data) {}

  public function envelope(): Envelope
  {
    return new Envelope(
      subject: "New enquiry from {$this->data['name']} via {$this->site->name}",
      replyTo: [new Address($this->data['email'], $this->data['name'])],
    );
  }

  public function content(): Content
  {
    return new Content(text: 'mail.contact');
  }
}
