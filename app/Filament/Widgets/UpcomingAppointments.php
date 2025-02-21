<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingAppointments extends BaseWidget
{
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Appointment::query()
                    ->where('status', 'confirmed')
                    ->where('preferred_date', '>=', now()->format('Y-m-d'))
                    ->where('preferred_date', '<=', now()->addDay()->format('Y-m-d'))
                    ->latest()
            )
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable(['first_name', 'last_name']),
                \Filament\Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('service_type_text')
                    ->label('Service')
                    ->badge(),
                \Filament\Tables\Columns\TextColumn::make('appointment_type_text')
                    ->label('Type')
                    ->badge(),
                \Filament\Tables\Columns\TextColumn::make('preferred_date')
                    ->date()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('preferred_time_text')
                    ->label('Time'),
                \Filament\Tables\Columns\TextColumn::make('professional.name')
                    ->label('Professional')
                    ->default('Unassigned'),
            ]);
    }
}
