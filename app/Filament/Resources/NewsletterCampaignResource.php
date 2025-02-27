<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterCampaignResource\Pages;
use App\Filament\Resources\NewsletterCampaignResource\RelationManagers;
use App\Jobs\SendNewsletterCampaign;
use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class NewsletterCampaignResource extends Resource
{
    protected static ?string $model = NewsletterCampaign::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'subject';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Campaign Details')
                    ->schema([
                        Forms\Components\TextInput::make('subject')
                            ->label('Email Subject')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\RichEditor::make('content')
                            ->label('Email Content')
                            ->required()
                            ->columnSpan(2)
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('newsletter-images')
                            ->helperText('Use {email} to include the recipient\'s email address in the content.'),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('recipients_count')
                                    ->label('Recipient Count')
                                    ->content(function () {
                                        $count = NewsletterSubscription::active()->verified()->count();
                                        return new HtmlString("<span class='font-medium'>{$count}</span> active subscribers");
                                    }),

                                Forms\Components\Placeholder::make('subscription_note')
                                    ->content(new HtmlString('<span class="text-sm text-gray-500">Email will be sent to all active and verified subscribers.</span>')),
                            ])
                            ->columnSpan(2),

                        Forms\Components\DateTimePicker::make('scheduled_for')
                            ->label('Schedule for later')
                            ->helperText('Leave empty to send immediately upon submission.')
                            ->nullable(),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'scheduled' => 'Scheduled',
                            ])
                            ->default('draft')
                            ->disabled(fn ($record) => $record && in_array($record->status, ['sending', 'sent']))
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'draft',
                        'warning' => 'scheduled',
                        'primary' => 'sending',
                        'success' => 'sent',
                        'danger' => 'failed',
                    ]),

                Tables\Columns\TextColumn::make('recipients_count')
                    ->label('Recipients')
                    ->sortable(),

                Tables\Columns\TextColumn::make('delivered_count')
                    ->label('Delivered')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sent_at')
                    ->label('Sent Date')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('scheduled_for')
                    ->label('Scheduled For')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Created By')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'scheduled' => 'Scheduled',
                        'sending' => 'Sending',
                        'sent' => 'Sent',
                        'failed' => 'Failed',
                    ]),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('send')
                    ->label('Send Now')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->action(function (NewsletterCampaign $record) {
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
                    })
                    ->visible(fn (NewsletterCampaign $record) => $record->status === 'draft' || $record->status === 'scheduled')
                    ->requiresConfirmation(),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletterCampaigns::route('/'),
            'create' => Pages\CreateNewsletterCampaign::route('/create'),
            'edit' => Pages\EditNewsletterCampaign::route('/{record}/edit'),
        ];
    }
}
