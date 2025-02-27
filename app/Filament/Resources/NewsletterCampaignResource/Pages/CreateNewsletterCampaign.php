<?php

namespace App\Filament\Resources\NewsletterCampaignResource\Pages;

use App\Filament\Resources\NewsletterCampaignResource;
use App\Jobs\SendNewsletterCampaign;
use App\Models\NewsletterSubscription;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateNewsletterCampaign extends CreateRecord
{
    protected static string $resource = NewsletterCampaignResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();

        // If scheduled, set status to scheduled
        if (!empty($data['scheduled_for'])) {
            $data['status'] = 'scheduled';
        }

        // Count recipients
        $data['recipients_count'] = NewsletterSubscription::active()->verified()->count();

        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;

        // If not scheduled, send immediately
        if (empty($record->scheduled_for) && $record->status === 'draft') {
            // Update status to sending
            $record->update(['status' => 'sending']);

            // Dispatch job to send the newsletter
            SendNewsletterCampaign::dispatch($record);

            Notification::make()
                ->title('Newsletter sending initiated')
                ->success()
                ->send();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
