<?php

namespace App\Traits;

use App\Models\ResourceView;
use Illuminate\Support\Carbon;

trait HasResourceViews
{
    /**
     * Relationship with resource views
     */
    public function views()
    {
        return $this->hasMany(ResourceView::class);
    }

    /**
     * Record a view for this resource
     */
    public function recordView($ip = null, $userAgent = null)
    {
        return $this->views()->create([
            'ip_address' => $ip ?? request()->ip(),
            'user_agent' => $userAgent ?? request()->userAgent()
        ]);
    }

    /**
     * Get count of unique views by IP address
     */
    public function getUniqueViewsCount()
    {
        return $this->views()
            ->distinct('ip_address')
            ->count('ip_address');
    }

    /**
     * Get views count between dates
     */
    public function getViewsCountBetween($startDate, $endDate)
    {
        return $this->views()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
    }

    /**
     * Get views trend data for a given number of days
     */
    public function getViewsTrendData($days = 7)
    {
        return $this->views()
            ->selectRaw('DATE(created_at) as date, COUNT(*) as views')
            ->whereDate('created_at', '>=', Carbon::now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }
}
