<?php

namespace App\Filament\Widgets;

use App\Models\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class MostViewedResources extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Most Viewed Resources';
    protected static ?string $pollingInterval = '30s';
    protected static ?string $maxHeight = '400px';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Resource::query()
                    ->withCount('views')
                    ->withCount(['views as today_views' => function (Builder $query) {
                        $query->whereDate('created_at', now());
                    }])
                    ->withCount(['views as unique_views' => function (Builder $query) {
                        $query->select(DB::raw('COUNT(DISTINCT ip_address)'));
                    }])
                    ->orderByDesc('views_count')
            )
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('')
                    ->circular()
                    ->size(40),

                Tables\Columns\TextColumn::make('title')
                    ->description(fn (Resource $record): string =>
                    \Illuminate\Support\Str::limit($record->summary ?? '', 60))
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('type.name')
                    ->badge()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'Guide' => 'success',
                        'Article' => 'info',
                        'eBook' => 'warning',
                        'Case Study' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('views_count')
                    ->label('Total Views')
                    ->sortable()
                    ->alignEnd()
                    ->color('success')
                    ->description(fn (Resource $record) =>
                        'Unique: ' . number_format($record->unique_views)),

                Tables\Columns\TextColumn::make('today_views')
                    ->label('Views Today')
                    ->sortable()
                    ->alignEnd()
                    ->color('info'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->date('M d, Y')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('author')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
//            ->filters([
//                Tables\Filters\SelectFilter::make('type')
//                    ->relationship('type', 'name'),
//
//                Tables\Filters\Filter::make('min_views')
//                    ->form([
//                       SelectFilter::make('min_views')
//                            ->options([
//                                100 => '100+ views',
//                                500 => '500+ views',
//                                1000 => '1000+ views',
//                                5000 => '5000+ views',
//                            ])
//                    ])
//                    ->query(function (Builder $query, array $data): Builder {
//                        return $query->when(
//                            $data['min_views'],
//                            fn (Builder $query, $minViews): Builder =>
//                            $query->having('views_count', '>=', $minViews)
//                        );
//                    }),
//
//                Tables\Filters\Filter::make('date')
//                    ->form([
//                        \Filament\Forms\Components\DatePicker::make('published_from'),
//                        \Filament\Forms\Components\DatePicker::make('published_until'),
//                    ])
//                    ->query(function (Builder $query, array $data): Builder {
//                        return $query
//                            ->when(
//                                $data['published_from'],
//                                fn (Builder $query, $date): Builder =>
//                                $query->whereDate('published_at', '>=', $date),
//                            )
//                            ->when(
//                                $data['published_until'],
//                                fn (Builder $query, $date): Builder =>
//                                $query->whereDate('published_at', '<=', $date),
//                            );
//                    })
//            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Resource $record): string => route('resources.show', $record))
                    ->icon('heroicon-m-eye')
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('analytics')
                    ->icon('heroicon-m-chart-bar')
                    ->modalContent(fn (Resource $record) => view('resources.analytics', [
                        'resource' => $record,
                        'viewsData' => $record->getViewsTrendData(7)
                    ]))
            ])
            ->defaultSort('views_count', 'desc')
            ->paginated([5, 10, 25, 50])
            ->defaultPaginationPageOption(10)
            ->poll('30s');
    }
}
