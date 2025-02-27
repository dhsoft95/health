<?php

namespace App\Filament\Resources\NewsletterCampaignResource\Pages;

use App\Filament\Resources\NewsletterCampaignResource;
use App\Jobs\SendNewsletterCampaign;
use App\Models\NewsletterSubscription;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditNewsletterCampaign extends EditRecord
{
    protected static string $resource = NewsletterCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),

            Actions\Action::make('send')
                ->label('Send Now')
                ->icon('heroicon-o-paper-airplane')
                ->color('success')
                ->action(function () {
                    // Get the record
                    $record = $this->record;

                    // Update campaign status
                    $record->update([
                        'status' => 'sending',
                        'recipients_count' => NewsletterSubscription::active()->verified()->count(),
                    ]);

                    // Dispatch job to send the newsletter
                    SendNewsletterCampaign::dispatch($record);

                    Notification::make()
                        ->title('Newsletter sending initiated')
                        ->success()
                        ->send();

                    // Redirect to index
                    redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => $this->record->status === 'draft' || $this->record->status === 'scheduled')
                ->requiresConfirmation(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
