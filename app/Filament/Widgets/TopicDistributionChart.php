<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TopicDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Resources by Topic';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $topics = \App\Models\Topic::withCount('resources')
            ->orderByDesc('resources_count')
            ->limit(10)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Resources per Topic',
                    'data' => $topics->pluck('resources_count')->toArray(),
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $topics->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
