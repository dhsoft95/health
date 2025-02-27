<?php

namespace App\Console\Commands;

use App\Jobs\SendNewsletterCampaign;
use App\Models\NewsletterCampaign;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendScheduledNewslettersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send scheduled newsletter campaigns';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking for scheduled newsletters...');

        // Get scheduled campaigns that are due to be sent
        $campaigns = NewsletterCampaign::where('status', 'scheduled')
            ->whereNotNull('scheduled_for')
            ->where('scheduled_for', '<=', now())
            ->get();

        if ($campaigns->isEmpty()) {
            $this->info('No scheduled newsletters to send.');
            return 0;
        }

        $this->info("Found {$campaigns->count()} scheduled newsletters to send.");

        foreach ($campaigns as $campaign) {
            $this->info("Dispatching job for campaign: {$campaign->subject}");

            // Update status to sending
            $campaign->update(['status' => 'sending']);

            // Dispatch job to send the newsletter
            SendNewsletterCampaign::dispatch($campaign);

            Log::info('Scheduled newsletter dispatched', [
                'campaign_id' => $campaign->id,
                'subject' => $campaign->subject,
            ]);
        }

        $this->info('All scheduled newsletters processed.');

        return 0;
    }
}
