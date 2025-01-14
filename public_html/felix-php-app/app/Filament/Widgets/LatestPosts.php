<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPosts extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()->latest()->take(10)
            )
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail'),
                TextColumn::make('name'),
                TextColumn::make('title')->limit(20),
                TextColumn::make('created_at'),
                TextColumn::make('author.name'),
                TextColumn::make('categories.name')
                    ->badge()
                    ->separator(','),
                TextColumn::make('tags.name')
                    ->badge()
                    ->separator(','),
                TextColumn::make('status')->badge(),
                TextColumn::make('type')->badge(),
            ])->headerActions([
                Action::make('view_all')
                    ->label('View All')
                    ->icon('heroicon-o-arrow-right')
                    ->url(route('filament.admin.resources.posts.index'))
            ])->paginated(false);
    }
}
