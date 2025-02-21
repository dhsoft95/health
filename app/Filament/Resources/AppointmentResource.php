<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Appointments';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'client_name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::pending()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::pending()->count() > 0 ? 'warning' : null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Client Information')
                            ->schema([
                                Forms\Components\TextInput::make('first_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('last_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(20),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Appointment Details')
                            ->schema([
                                Forms\Components\Select::make('service_type')
                                    ->options([
                                        'individual_therapy' => 'Individual Therapy',
                                        'couples_therapy' => 'Couples Therapy',
                                        'teen_therapy' => 'Teen Therapy',
                                        'employee_therapy' => 'Employee Therapy',
                                        'psychiatry' => 'Psychiatry',
                                    ])
                                    ->required(),
                                Forms\Components\Select::make('appointment_type')
                                    ->options([
                                        'teleconsultation' => 'Teleconsultation',
                                        'home_visit' => 'Home Visit',
                                    ])
                                    ->required(),
                                Forms\Components\DatePicker::make('preferred_date')
                                    ->required(),
                                Forms\Components\Select::make('preferred_time')
                                    ->options([
                                        'morning' => 'Morning (8AM - 12PM)',
                                        'afternoon' => 'Afternoon (12PM - 4PM)',
                                        'evening' => 'Evening (4PM - 8PM)',
                                    ])
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'confirmed' => 'Confirmed',
                                        'rescheduled' => 'Rescheduled',
                                        'cancelled' => 'Cancelled',
                                        'completed' => 'Completed',
                                    ])
                                    ->default('pending')
                                    ->required(),
                                Forms\Components\DateTimePicker::make('confirmed_at')
                                    ->label('Confirmation Date/Time'),
                                Forms\Components\DateTimePicker::make('actual_appointment_time')
                                    ->label('Actual Appointment Time'),
                                Forms\Components\Select::make('assigned_professional_id')
                                    ->label('Assigned Professional')
                                    ->relationship('professional', 'name')
                                    ->searchable()
                                    ->preload(),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Additional Information')
                            ->schema([
                                Forms\Components\Textarea::make('message')
                                    ->label('Client Message')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('admin_notes')
                                    ->label('Admin Notes')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Insurance Information')
                            ->schema([
                                Forms\Components\Toggle::make('has_insurance')
                                    ->label('Has Insurance')
                                    ->default(false),
                                Forms\Components\TextInput::make('insurance_provider')
                                    ->maxLength(255)
                                    ->visible(fn (Forms\Get $get): bool => $get('has_insurance')),
                                Forms\Components\TextInput::make('insurance_member_id')
                                    ->maxLength(255)
                                    ->visible(fn (Forms\Get $get): bool => $get('has_insurance')),
                            ]),

                        Forms\Components\Section::make('System Information')
                            ->schema([
                                Forms\Components\TextInput::make('ip_address')
                                    ->label('IP Address')
                                    ->disabled(),
                                Forms\Components\Toggle::make('consent')
                                    ->label('Gave Consent')
                                    ->disabled(),
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Created Date')
                                    ->content(fn (?Appointment $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last Modified')
                                    ->content(fn (?Appointment $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable(['first_name', 'last_name']),
                Tables\Columns\TextColumn::make('service_type_text')
                    ->label('Service')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('appointment_type_text')
                    ->label('Type')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preferred_date')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preferred_time_text')
                    ->label('Time')
                    ->badge(),
                Tables\Columns\TextColumn::make('status_text')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Confirmed' => 'info',
                        'Rescheduled' => 'warning',
                        'Cancelled' => 'danger',
                        'Completed' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('professional.name')
                    ->label('Professional')
                    ->default('-')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Requested')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'rescheduled' => 'Rescheduled',
                        'cancelled' => 'Cancelled',
                        'completed' => 'Completed',
                    ]),
                SelectFilter::make('service_type')
                    ->label('Service')
                    ->options([
                        'individual_therapy' => 'Individual Therapy',
                        'couples_therapy' => 'Couples Therapy',
                        'teen_therapy' => 'Teen Therapy',
                        'employee_therapy' => 'Employee Therapy',
                        'psychiatry' => 'Psychiatry',
                    ]),
                SelectFilter::make('appointment_type')
                    ->label('Type')
                    ->options([
                        'teleconsultation' => 'Teleconsultation',
                        'home_visit' => 'Home Visit',
                    ]),
                Filter::make('preferred_date')
                    ->form([
                        Forms\Components\DatePicker::make('date_from'),
                        Forms\Components\DatePicker::make('date_to'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('preferred_date', '>=', $date),
                            )
                            ->when(
                                $data['date_to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('preferred_date', '<=', $date),
                            );
                    }),
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                Filter::make('has_insurance')
                    ->label('Insurance')
                    ->query(fn (Builder $query): Builder => $query->where('has_insurance', true))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('confirm')
                        ->label('Confirm')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->visible(fn (Appointment $record): bool => $record->status === 'pending')
                        ->action(function (Appointment $record) {
                            $record->update([
                                'status' => 'confirmed',
                                'confirmed_at' => now(),
                            ]);
                        }),
                    Tables\Actions\Action::make('cancel')
                        ->label('Cancel')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->visible(fn (Appointment $record): bool => in_array($record->status, ['pending', 'confirmed', 'rescheduled']))
                        ->action(function (Appointment $record) {
                            $record->update([
                                'status' => 'cancelled',
                            ]);
                        }),
                    Tables\Actions\Action::make('complete')
                        ->label('Mark Completed')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn (Appointment $record): bool => $record->status === 'confirmed')
                        ->action(function (Appointment $record) {
                            $record->update([
                                'status' => 'completed',
                            ]);
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('confirmMultiple')
                        ->label('Confirm Selected')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                if ($record->status === 'pending') {
                                    $record->update([
                                        'status' => 'confirmed',
                                        'confirmed_at' => now(),
                                    ]);
                                }
                            });
                        }),
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'view' => Pages\ViewAppointment::route('/{record}'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
