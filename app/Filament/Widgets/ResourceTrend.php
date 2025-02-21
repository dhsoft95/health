<?php

namespace App\Filament\Widgets;

use App\Models\Resource;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ResourceTrend extends ChartWidget
{
    protected static ?string $heading = 'Resources Growth';
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '30s';

    protected function getData(): array
    {
        $data = Trend::model(Resource::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Resources Created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#3b82f6',
                    'fill' => false,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
