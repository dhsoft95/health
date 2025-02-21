<?php

namespace App\Filament\Widgets;

use App\Models\ResourceType;
use Filament\Widgets\ChartWidget;

class ResourceTypeChart extends ChartWidget
{
    protected static ?string $heading = 'Resources by Type';
    protected static ?int $sort = 2;
    protected static ?string $pollingInterval = '30s';

    protected function getData(): array
    {
        $data = ResourceType::withCount('resources')
            ->get()
            ->map(fn ($type) => [
                'name' => $type->name,
                'count' => $type->resources_count,
            ]);

        return [
            'datasets' => [
                [
                    'label' => 'Resources',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#3b82f6',  // blue
                        '#10b981',  // green
                        '#f59e0b',  // yellow
                        '#ef4444',  // red
                        '#8b5cf6',  // purple
                    ],
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
