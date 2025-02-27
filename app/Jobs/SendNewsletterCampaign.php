<?php

namespace App\Jobs;

use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscription;
use App\Mail\NewsletterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendNewsletterCampaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The newsletter campaign instance.
     *
     * @var \App\Models\NewsletterCampaign
     */
    protected $campaign;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public $maxExceptions = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(NewsletterCampaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get all active and verified subscribers
        $subscribers = NewsletterSubscription::active()->verified()->get();

        // Update recipient count
        $this->campaign->update([
            'recipients_count' => $subscribers->count(),
        ]);

        // If no subscribers, mark as sent with 0 delivered
        if ($subscribers->count() === 0) {
            $this->campaign->update([
                'status' => 'sent',
                'sent_at' => now(),
                'delivered_count' => 0,
            ]);

            Log::info('Newsletter campaign has no subscribers', [
                'campaign_id' => $this->campaign->id,
                'subject' => $this->campaign->subject,
            ]);

            return;
        }

        // Counter for delivered emails
        $deliveredCount = 0;

        try {
            // Send email to each subscriber
            foreach ($subscribers as $subscriber) {
                try {
                    Mail::to($subscriber->email)
                        ->send(new NewsletterMail($this->campaign, $subscriber->email));

                    // Increment delivered count
                    $deliveredCount++;

                    // Update campaign every 10 emails
                    if ($deliveredCount % 10 === 0) {
                        $this->campaign->update([
                            'delivered_count' => $deliveredCount,
                        ]);
                    }

                    // Add a small delay to prevent flooding the mail server
                    usleep(100000); // 100ms delay

                } catch (\Exception $e) {
                    Log::error('Failed to send newsletter to subscriber', [
                        'campaign_id' => $this->campaign->id,
                        'email' => $subscriber->email,
                        'error' => $e->getMessage(),
                    ]);

                    // Continue with next subscriber
                    continue;
                }
            }

            // Mark campaign as sent
            $this->campaign->update([
                'status' => 'sent',
                'sent_at' => now(),
                'delivered_count' => $deliveredCount,
            ]);

            Log::info('Newsletter campaign sent successfully', [
                'campaign_id' => $this->campaign->id,
                'subject' => $this->campaign->subject,
                'recipients' => $subscribers->count(),
                'delivered' => $deliveredCount,
            ]);

        } catch (\Exception $e) {
            // Mark campaign as failed
            $this->campaign->update([
                'status' => 'failed',
                'delivered_count' => $deliveredCount,
            ]);

            Log::error('Newsletter campaign failed', [
                'campaign_id' => $this->campaign->id,
                'subject' => $this->campaign->subject,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Re-throw the exception to trigger job retry
            throw $e;
        }
    }

    /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(\Throwable $exception): void
    {
        // Mark campaign as failed
        $this->campaign->update([
            'status' => 'failed',
        ]);

        Log::error('Newsletter job failed after retries', [
            'campaign_id' => $this->campaign->id,
            'subject' => $this->campaign->subject,
            'error' => $exception->getMessage(),
        ]);
    }
}
