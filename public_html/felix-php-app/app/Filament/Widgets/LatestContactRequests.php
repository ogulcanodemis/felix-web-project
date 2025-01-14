<?php

namespace App\Filament\Widgets;

use App\Models\ContactRequest;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Actions\Action;

class LatestContactRequests extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactRequest::query()
            )
            ->columns([
                TextColumn::make('subject'),
                TextColumn::make('name'),
                TextColumn::make('email'),
                IconColumn::make('reply_status')
                    ->boolean()
                    ->falseIcon('heroicon-o-clock')
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label('View All')
                    ->icon('heroicon-o-arrow-right')
                    ->url(route('filament.admin.resources.contact-requests.index'))
            ])->paginated(false);
    }
}
