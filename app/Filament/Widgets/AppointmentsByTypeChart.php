<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\ChartWidget;

class AppointmentsByTypeChart extends ChartWidget
{
    protected static ?string $heading = 'Appointments by Service Type';

    public static function getColumns(): int
    {
        return 2; // Set number of columns for widget grid
    }

    protected function getData(): array
    {
        $data = Appointment::selectRaw('service_type, COUNT(*) as count')
            ->groupBy('service_type')
            ->get()
            ->mapWithKeys(function ($item) {
                $labels = [
                    'individual_therapy' => 'Individual Therapy',
                    'couples_therapy' => 'Couples Therapy',
                    'teen_therapy' => 'Teen Therapy',
                    'employee_therapy' => 'Employee Therapy',
                    'psychiatry' => 'Psychiatry',
                ];

                return [
                        $labels[$item->service_type] ?? $item->service_type => $item->count
                ];
            });

        return [
            'datasets' => [
                [
                    'label' => 'Appointments',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => [
                        '#36A2EB',
                        '#FF6384',
                        '#4BC0C0',
                        '#FF9F40',
                        '#9966FF',
                    ],
                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
