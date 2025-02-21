<!-- resources/views/resources/analytics.blade.php -->
<div class="analytics-container">
    <div class="analytics-header">
        <h3>Resource Performance</h3>
        <p>{{ $resource->title }}</p>
    </div>

    <div class="stats-container">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-details">
                <h4>Total Views</h4>
                <p class="stat-value">{{ number_format($resource->views->count()) }}</p>
            </div>
        </div>

        <div class="stat-card secondary">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-details">
                <h4>Unique Visitors</h4>
                <p class="stat-value">{{ number_format($resource->getUniqueViewsCount()) }}</p>
            </div>
        </div>

        <div class="stat-card tertiary">
            <div class="stat-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-details">
                <h4>Daily Average</h4>
                <p class="stat-value">{{ number_format(round($resource->views->count() / 7, 1)) }}</p>
            </div>
        </div>
    </div>

    <div class="time-period">
        <p>Last 7 days: {{ \Carbon\Carbon::now()->subDays(6)->format('M d') }} - {{ \Carbon\Carbon::now()->format('M d, Y') }}</p>
    </div>

    <div class="chart-container">
        <h4><i class="fas fa-chart-bar"></i> Daily Views</h4>

        <div class="chart">
            @php
                $dates = [];
                $viewCounts = [];
                $maxViews = 1;

                // Get all dates in the past 7 days
                for ($i = 6; $i >= 0; $i--) {
                    $date = \Carbon\Carbon::now()->subDays($i)->format('Y-m-d');
                    $dates[] = $date;

                    // Find views for this date
                    $dateViews = 0;
                    foreach ($viewsData as $data) {
                        if ($data->date == $date) {
                            $dateViews = $data->views;
                            if ($dateViews > $maxViews) {
                                $maxViews = $dateViews;
                            }
                            break;
                        }
                    }
                    $viewCounts[] = $dateViews;
                }
            @endphp

            <div class="chart-grid">
                @for($i = 5; $i >= 0; $i--)
                    <div class="grid-line">
                        <div class="grid-label">{{ ceil($maxViews * ($i/5)) }}</div>
                    </div>
                @endfor
            </div>

            <div class="bar-container">
                @foreach($dates as $index => $date)
                    @php
                        $height = $maxViews > 0 ? (($viewCounts[$index] / $maxViews) * 100) : 0;
                        $dayOfWeek = \Carbon\Carbon::parse($date)->format('D');
                        $dayNum = \Carbon\Carbon::parse($date)->format('d');
                        $isToday = \Carbon\Carbon::parse($date)->isToday();
                    @endphp
                    <div class="bar-column">
                        <div class="bar-tooltip">{{ $viewCounts[$index] }} views</div>
                        <div class="bar {{ $isToday ? 'today' : '' }}" style="height: {{ $height }}%"></div>
                        <div class="bar-label">
                            <div class="day">{{ $dayOfWeek }}</div>
                            <div class="date">{{ $dayNum }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="details-container">
        <h4><i class="fas fa-list"></i> Detailed Summary</h4>

        <div class="table-responsive">
            <table class="details-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Views</th>
                        <th>% of Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalViews = array_sum($viewCounts);
                    @endphp

                    @foreach($dates as $index => $date)
                        @php
                            $isToday = \Carbon\Carbon::parse($date)->isToday();
                            $percentage = $totalViews > 0 ? round(($viewCounts[$index] / $totalViews) * 100, 1) : 0;
                        @endphp
                        <tr class="{{ $isToday ? 'today-row' : '' }}">
                            <td>
                                {{ \Carbon\Carbon::parse($date)->format('D, M d') }}
                                @if($isToday)<span class="today-label">Today</span>@endif
                            </td>
                            <td>{{ $viewCounts[$index] }}</td>
                            <td>
                                <div class="percentage-bar-container">
                                    <div class="percentage-bar" style="width: {{ $percentage }}%"></div>
                                    <span class="percentage-value">{{ $percentage }}%</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{ $totalViews }}</strong></td>
                        <td><strong>100%</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="additional-info">
        <p><i class="fas fa-info-circle"></i> This data represents user interactions with your resource. Track performance over time to identify trends and optimize your content.</p>
    </div>

    <div class="theme-toggle">
        <button id="theme-switch" class="theme-switch">
            <i class="fas fa-moon dark-icon"></i>
            <i class="fas fa-sun light-icon"></i>
        </button>
    </div>
</div>

<style>
    :root {
        --bg-primary: #ffffff;
        --bg-secondary: #f8f9fa;
        --bg-tertiary: #f1f3f5;
        --text-primary: #333333;
        --text-secondary: #666666;
        --text-tertiary: #999999;
        --border-color: #e0e0e0;
        --highlight-primary: #4a6cf7;
        --highlight-secondary: #6c5ce7;
        --highlight-tertiary: #00b894;
        --chart-grid: rgba(0, 0, 0, 0.05);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --card-hover-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        --card-bg-gradient: linear-gradient(to right, rgba(255,255,255,0.8), rgba(255,255,255,0.5));
        --tooltip-bg: #333333;
        --tooltip-color: #ffffff;
    }

    [data-theme="dark"] {
        --bg-primary: #1a1a2e;
        --bg-secondary: #16213e;
        --bg-tertiary: #0f3460;
        --text-primary: #e6e6e6;
        --text-secondary: #b8b8b8;
        --text-tertiary: #8a8a8a;
        --border-color: #2a2a42;
        --highlight-primary: #4361ee;
        --highlight-secondary: #7579e7;
        --highlight-tertiary: #0f9b8e;
        --chart-grid: rgba(255, 255, 255, 0.05);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        --card-hover-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
        --card-bg-gradient: linear-gradient(to right, rgba(26,26,46,0.8), rgba(26,26,46,0.5));
        --tooltip-bg: #e6e6e6;
        --tooltip-color: #1a1a2e;
    }

    .analytics-container {
        background-color: var(--bg-primary);
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        padding: 30px;
        max-width: 100%;
        margin: 0 auto;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        position: relative;
        transition: all 0.3s ease;
    }

    .analytics-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .analytics-header h3 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 5px;
        transition: color 0.3s ease;
    }

    .analytics-header p {
        color: var(--text-secondary);
        margin: 0;
        font-size: 16px;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color 0.3s ease;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--card-bg-gradient);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-left: 5px solid var(--highlight-primary);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-hover-shadow);
    }

    .stat-card.primary {
        border-color: var(--highlight-primary);
    }

    .stat-card.primary .stat-icon {
        background: rgba(74, 108, 247, 0.1);
        color: var(--highlight-primary);
    }

    .stat-card.secondary {
        border-color: var(--highlight-secondary);
    }

    .stat-card.secondary .stat-icon {
        background: rgba(108, 92, 231, 0.1);
        color: var(--highlight-secondary);
    }

    .stat-card.tertiary {
        border-color: var(--highlight-tertiary);
    }

    .stat-card.tertiary .stat-icon {
        background: rgba(0, 184, 148, 0.1);
        color: var(--highlight-tertiary);
    }

    [data-theme="dark"] .stat-card.primary .stat-icon {
        background: rgba(74, 108, 247, 0.2);
    }

    [data-theme="dark"] .stat-card.secondary .stat-icon {
        background: rgba(108, 92, 231, 0.2);
    }

    [data-theme="dark"] .stat-card.tertiary .stat-icon {
        background: rgba(0, 184, 148, 0.2);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .stat-icon i {
        font-size: 22px;
        transition: color 0.3s ease;
    }

    .stat-details {
        flex-grow: 1;
    }

    .stat-details h4 {
        margin: 0;
        font-size: 14px;
        color: var(--text-secondary);
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        margin: 5px 0 0;
        color: var(--text-primary);
        transition: color 0.3s ease;
    }

    .time-period {
        text-align: center;
        margin-bottom: 20px;
    }

    .time-period p {
        display: inline-block;
        padding: 6px 16px;
        background-color: var(--bg-secondary);
        border-radius: 20px;
        font-size: 14px;
        color: var(--text-secondary);
        margin: 0;
        transition: all 0.3s ease;
    }

    .chart-container, .details-container {
        background-color: var(--bg-secondary);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    .chart-container h4, .details-container h4 {
        font-size: 18px;
        margin-top: 0;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-primary);
        transition: all 0.3s ease;
    }

    .chart-container h4 i, .details-container h4 i {
        margin-right: 8px;
        color: var(--highlight-primary);
        transition: color 0.3s ease;
    }

    .chart {
        height: 250px;
        width: 100%;
        position: relative;
        padding-top: 20px;
        padding-bottom: 30px;
    }

    .chart-grid {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .grid-line {
        position: relative;
        width: 100%;
        height: 1px;
        background-color: var(--chart-grid);
        transition: background-color 0.3s ease;
    }

    .grid-label {
        position: absolute;
        left: 0;
        top: -9px;
        font-size: 11px;
        color: var(--text-tertiary);
        transition: color 0.3s ease;
    }

    .bar-container {
        position: absolute;
        top: 0;
        left: 40px;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: flex-end;
        padding-bottom: 30px;
    }

    .bar-column {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        height: 100%;
    }

    .bar-tooltip {
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        background-color: var(--tooltip-bg);
        color: var(--tooltip-color);
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 12px;
        opacity: 0;
        transition: all 0.3s ease;
        pointer-events: none;
        white-space: nowrap;
        z-index: 100;
    }

    .bar-column:hover .bar-tooltip {
        opacity: 1;
    }

    .bar {
        width: 60%;
        background: var(--highlight-primary);
        border-radius: 4px 4px 0 0;
        transition: all 0.3s ease;
        min-height: 1px;
    }

    .bar.today {
        background: var(--highlight-tertiary);
    }

    .bar-column:hover .bar {
        opacity: 0.9;
        box-shadow: 0 0 10px rgba(74, 108, 247, 0.5);
    }

    .bar-column:hover .bar.today {
        opacity: 0.9;
        box-shadow: 0 0 10px rgba(0, 184, 148, 0.5);
    }

    .bar-label {
        margin-top: 8px;
        text-align: center;
        font-size: 12px;
        color: var(--text-secondary);
        transition: color 0.3s ease;
    }

    .bar-label .day {
        font-weight: 500;
    }

    .bar-label .date {
        margin-top: 2px;
        color: var(--text-tertiary);
        transition: color 0.3s ease;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .details-table {
        width: 100%;
        border-collapse: collapse;
    }

    .details-table th, .details-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .details-table th {
        font-weight: 600;
        color: var(--text-primary);
        background-color: var(--bg-tertiary);
        transition: all 0.3s ease;
    }

    .details-table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    [data-theme="dark"] .details-table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.02);
    }

    .today-row {
        background-color: rgba(0, 184, 148, 0.05);
    }

    .today-row:hover {
        background-color: rgba(0, 184, 148, 0.1) !important;
    }

    [data-theme="dark"] .today-row {
        background-color: rgba(0, 184, 148, 0.1);
    }

    [data-theme="dark"] .today-row:hover {
        background-color: rgba(0, 184, 148, 0.15) !important;
    }

    .today-label {
        display: inline-block;
        margin-left: 8px;
        padding: 2px 6px;
        background-color: var(--highlight-tertiary);
        color: white;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 600;
        vertical-align: middle;
        transition: background-color 0.3s ease;
    }

    .percentage-bar-container {
        width: 100%;
        height: 6px;
        background-color: rgba(0, 0, 0, 0.05);
        border-radius: 3px;
        position: relative;
        overflow: hidden;
        transition: background-color 0.3s ease;
    }

    [data-theme="dark"] .percentage-bar-container {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .percentage-bar {
        height: 100%;
        background-color: var(--highlight-primary);
        border-radius: 3px;
        transition: background-color 0.3s ease;
    }

    .percentage-value {
        position: absolute;
        right: 0;
        top: -18px;
        font-size: 12px;
        color: var(--text-secondary);
        transition: color 0.3s ease;
    }

    .additional-info {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
        transition: border-color 0.3s ease;
    }

    .additional-info p {
        color: var(--text-tertiary);
        font-size: 14px;
        margin: 0;
        transition: color 0.3s ease;
    }

    .additional-info i {
        color: var(--highlight-primary);
        margin-right: 6px;
        transition: color 0.3s ease;
    }

    .theme-toggle {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .theme-switch {
        background: none;
        border: none;
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--bg-secondary);
        color: var(--text-primary);
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .theme-switch:hover {
        background-color: var(--bg-tertiary);
    }

    .dark-icon, .light-icon {
        transition: all 0.3s ease;
    }

    html:not([data-theme="dark"]) .dark-icon {
        display: inline-block;
    }

    html:not([data-theme="dark"]) .light-icon {
        display: none;
    }

    [data-theme="dark"] .dark-icon {
        display: none;
    }

    [data-theme="dark"] .light-icon {
        display: inline-block;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .stats-container {
            grid-template-columns: 1fr;
        }

        .analytics-container {
            padding: 20px;
        }

        .bar-container {
            left: 30px;
        }

        .grid-label {
            font-size: 10px;
        }

        .theme-toggle {
            top: 10px;
            right: 10px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check for saved theme preference or use system preference
        const savedTheme = localStorage.getItem('theme');

        if (savedTheme) {
            document.documentElement.setAttribute('data-theme', savedTheme);
        } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-theme', 'dark');
        }

        // Toggle theme function
        document.getElementById('theme-switch').addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });
    });
</script>
