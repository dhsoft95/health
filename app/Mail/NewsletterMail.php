<?php

namespace App\Mail;

use App\Models\NewsletterCampaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Str;

class NewsletterMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The campaign instance.
     *
     * @var \App\Models\NewsletterCampaign
     */
    public $campaign;

    /**
     * The recipient's email address.
     *
     * @var string
     */
    public $recipientEmail;

    /**
     * The unique identifier for tracking opens.
     *
     * @var string
     */
    public $trackingId;

    /**
     * Create a new message instance.
     */
    public function __construct(NewsletterCampaign $campaign, string $recipientEmail)
    {
        $this->campaign = $campaign;
        $this->recipientEmail = $recipientEmail;
        $this->trackingId = Str::uuid()->toString();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: $this->campaign->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Personalize content
        $content = $this->campaign->content;
        $content = str_replace('{email}', $this->recipientEmail, $content);

        // Add tracking pixel for open rate tracking
        $trackingPixel = '<img src="' . route('newsletter.track-open', ['id' => $this->trackingId]) . '" width="1" height="1" alt="" style="display:none;">';

        return new Content(
            view: 'emails.newsletter',
            with: [
                'content' => $content,
                'trackingPixel' => $trackingPixel,
                'email' => $this->recipientEmail,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
