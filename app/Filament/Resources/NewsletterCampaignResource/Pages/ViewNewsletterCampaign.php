<?php

namespace App\Filament\Resources\NewsletterCampaignResource\Pages;

use App\Jobs\SendNewsletterCampaign;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;

class ViewNewsletterCampaign extends ViewRecord
{

    protected function getHeaderActions(): array
    {
        return [
             EditAction::make(),

              Action::make('send')
                ->label('Send Now')
                ->icon('heroicon-o-paper-airplane')
                ->color('success')
                ->action(function () {
                    // Get the record
                    $record = $this->record;

                    // Update campaign status
                    $record->update([
                        'status' => 'sending',
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

}
