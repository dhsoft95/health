<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceResource\Pages;
use App\Filament\Resources\ResourceResource\RelationManagers;
use App\Models\Resource as ResourceModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ResourceResource extends Resource
{
    protected static ?string $model = ResourceModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Basic Information')
                            ->schema([
                                Forms\Components\Select::make('resource_type_id')
                                    ->relationship('type', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(true)
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('description')
                                            ->rows(3)
                                    ]),

                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) =>
                                    $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignorable: fn ($record) => $record),

                                Forms\Components\Textarea::make('summary')
                                    ->rows(3)
                                    ->maxLength(500),

                                Forms\Components\RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('resources/content')
                            ]),

                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('resources/featured')
                                    ->maxSize(5120)
                                    ->helperText('Maximum file size: 5MB')
                                    ->columnSpanFull(),

                                Forms\Components\FileUpload::make('attachments')
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->directory('resources/attachments')
                                    ->preserveFilenames()
                                    ->maxSize(10240)
                                    ->helperText('Maximum 5 files, 10MB each')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make('SEO Information')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(60)
                                    ->helperText('Optimal length: 50-60 characters'),

                                Forms\Components\Textarea::make('meta_description')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText('Optimal length: 150-160 characters'),

                                Forms\Components\TagsInput::make('meta_keywords')
                                    ->separator(',')
                                    ->helperText('Separate keywords with commas'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Publishing')
                            ->schema([
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->helperText('Make this resource visible to users')
                                    ->default(false),

                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured')
                                    ->helperText('Show this resource in featured sections')
                                    ->default(false),

                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->default(now()),

                                Forms\Components\TextInput::make('author')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('reading_time')
                                    ->numeric()
                                    ->suffix('minutes')
                                    ->default(5),
                            ]),

                        Forms\Components\Section::make('Categorization')
                            ->schema([
                                Forms\Components\Select::make('topics')
                                    ->multiple()
                                    ->relationship('topics', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('description')
                                            ->rows(2)
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.png'))
                    ->size(40),

                Tables\Columns\TextColumn::make('title')
                    ->description(fn (ResourceModel $record): string => Str::limit($record->summary ?? '', 60))
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('type.name')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Guide' => 'success',
                        'Article' => 'info',
                        'eBook' => 'warning',
                        'Case Study' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('topics.name')
                    ->label('Topics')
                    ->badge()
                    ->color('primary')
                    ->separator(',')
                    ->limitList(2)
                    ->expandableLimitedList(),

                Tables\Columns\TextColumn::make('author')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('reading_time')
                    ->label('Read Time')
                    ->suffix(' min')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('resource_type')
                    ->relationship('type', 'name')
                    ->multiple()
                    ->preload(),

                Tables\Filters\SelectFilter::make('topics')
                    ->relationship('topics', 'name')
                    ->multiple()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status')
                    ->placeholder('All records')
                    ->trueLabel('Published only')
                    ->falseLabel('Drafts only'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Status')
                    ->placeholder('All records')
                    ->trueLabel('Featured only')
                    ->falseLabel('Not featured only'),

                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from'),
                        Forms\Components\DatePicker::make('published_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('preview')
                        ->label('Preview')
                        ->icon('heroicon-s-eye')
                        ->color('info')
                        ->url(fn (ResourceModel $record) => route('resources.show', $record))
                        ->openUrlInNewTab(),
                    Tables\Actions\Action::make('duplicate')
                        ->label('Duplicate')
                        ->icon('heroicon-s-document-duplicate')
                        ->color('success')
                        ->action(function (ResourceModel $record) {
                            $duplicate = $record->replicate();
                            $duplicate->title = "Copy of " . $duplicate->title;
                            $duplicate->slug = Str::slug($duplicate->title);
                            $duplicate->is_published = false;
                            $duplicate->save();

                            // Copy relationships
                            $duplicate->topics()->attach($record->topics->pluck('id'));
                        }),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('publish')
                        ->label('Publish Selected')
                        ->icon('heroicon-s-check')
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                $record->update([
                                    'is_published' => true,
                                    'published_at' => now(),
                                ]);
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('unpublish')
                        ->label('Unpublish Selected')
                        ->icon('heroicon-s-x-mark')
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                $record->update([
                                    'is_published' => false,
                                    'published_at' => null,
                                ]);
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->defaultSort('published_at', 'desc')
            ->persistSortInSession()
            ->deferLoading()
            ->poll('60s')
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->defaultPaginationPageOption(25);
    }



    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            'edit' => Pages\EditResource::route('/{record}/edit'),
        ];
    }
}
