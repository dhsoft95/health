<?php

namespace App\Filament\Widgets;

use App\Models\Resource;
use App\Models\ResourceView;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class ResourceStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $totalResources = Resource::count();
        $publishedResources = Resource::where('is_published', true)->count();
        $featuredResources = Resource::where('is_featured', true)->count();

        return [
            Stat::make('Total Resources', $totalResources)
                ->description('Total number of resources')
                ->descriptionIcon('heroicon-m-document-text')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->color('success'),

            Stat::make('Published Resources', $publishedResources)
                ->description($this->getPublishedPercentage() . '% of total')
                ->descriptionIcon('heroicon-m-check-circle')
                ->chart([3, 5, 7, 4, 5, 3, 5, 4])
                ->color('info'),

            Stat::make('Featured Resources', $featuredResources)
                ->description($this->getFeaturedPercentage() . '% of published')
                ->descriptionIcon('heroicon-m-star')
                ->chart([4, 5, 3, 7, 4, 5, 3, 4])
                ->color('warning'),
            Stat::make('Total Views', ResourceView::count())
                ->description('All time resource views')
                ->descriptionIcon('heroicon-m-eye')
                ->chart($this->getViewsTrend())
                ->color('success'),

            Stat::make('Views Today', $this->getViewsToday())
                ->description($this->getViewsTrendToday())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($this->getTodayViewsTrend())
                ->color('info'),

            Stat::make('Unique Viewers', $this->getUniqueViewers())
                ->description('Based on IP addresses')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart($this->getUniqueViewersTrend())
                ->color('warning'),
        ];
    }

    private function getViewsToday(): int
    {
        return ResourceView::whereDate('created_at', Carbon::today())->count();
    }

    private function getViewsTrendToday(): string
    {
        $yesterdayViews = ResourceView::whereDate('created_at', Carbon::yesterday())->count();
        $todayViews = $this->getViewsToday();

        if ($yesterdayViews === 0) return 'First views today';

        $percentage = (($todayViews - $yesterdayViews) / $yesterdayViews) * 100;
        return number_format(abs($percentage), 1) . '% ' . ($percentage >= 0 ? 'increase' : 'decrease') . ' from yesterday';
    }

    private function getUniqueViewers(): int
    {
        return ResourceView::distinct('ip_address')->count('ip_address');
    }

    private function getViewsTrend(): array
    {
        return ResourceView::selectRaw('COUNT(*) as count')
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->pluck('count')
            ->toArray();
    }

    private function getTodayViewsTrend(): array
    {
        return ResourceView::selectRaw('COUNT(*) as count')
            ->whereDate('created_at', Carbon::today())
            ->groupByRaw('HOUR(created_at)')
            ->pluck('count')
            ->toArray();
    }

    private function getUniqueViewersTrend(): array
    {
        return ResourceView::selectRaw('COUNT(DISTINCT ip_address) as count')
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->pluck('count')
            ->toArray();
    }

    protected function getPublishedPercentage(): float
    {
        $total = Resource::count();
        if ($total === 0) return 0;

        $published = Resource::where('is_published', true)->count();
        return round(($published / $total) * 100, 1);
    }

    protected function getFeaturedPercentage(): float
    {
        $published = Resource::where('is_published', true)->count();
        if ($published === 0) return 0;

        $featured = Resource::where('is_featured', true)->count();
        return round(($featured / $published) * 100, 1);
    }
}
