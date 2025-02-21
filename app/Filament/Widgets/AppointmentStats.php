<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AppointmentStats extends BaseWidget
{
    protected function getStats(): array
    {
        $todayAppointments = Appointment::where('preferred_date', now()->format('Y-m-d'))
            ->where('status', 'confirmed')
            ->count();

        $pendingAppointments = Appointment::where('status', 'pending')->count();

        $upcomingAppointments = Appointment::whereIn('status', ['confirmed', 'rescheduled'])
            ->where('preferred_date', '>', now()->format('Y-m-d'))
            ->count();

        return [
            Stat::make('Today\'s Appointments', $todayAppointments)
                ->description('Confirmed appointments for today')
                ->descriptionIcon('heroicon-m-calendar')
                ->color($todayAppointments > 0 ? 'success' : 'gray'),

            Stat::make('Pending Appointments', $pendingAppointments)
                ->description('Appointments awaiting confirmation')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingAppointments > 0 ? 'warning' : 'gray'),

            Stat::make('Upcoming Appointments', $upcomingAppointments)
                ->description('Future confirmed appointments')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
        ];
    }
}
