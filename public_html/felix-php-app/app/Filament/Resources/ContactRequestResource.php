<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRequestResource\Pages;
use App\Filament\Resources\ContactRequestResource\RelationManagers;
use App\Models\ContactRequest;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\HtmlString;
use Filament\Tables\Filters\TernaryFilter;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;
    protected static ?string $navigationIcon = 'ionicon-mail-outline';

    public static function getNavigationBadge(): ?string
    {
        $records = static::getModel()::all();
        return $records->filter(fn($request) => !$request->reply_status)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Info')->schema([
                    Forms\Components\TextInput::make('name')->columnSpan(2),
                    Forms\Components\TextInput::make('email'),
                    Forms\Components\TextInput::make('phone'),
                    Forms\Components\TextInput::make('subject')->columnSpan(2),
                ])
                    ->disabled(),
                Forms\Components\Repeater::make('messages')
                    ->relationship()
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Placeholder::make('recipient.name')
                                ->label(' ')
                                ->content(fn($record) => new HtmlString('<i>Recipient name:</i> </br> ' . $record->recipient->name))
                                ->visible(fn($record) => $record?->recipient?->name !== null)
                                ->columnSpan(2),
                            Forms\Components\Placeholder::make('message')
                                ->label(' ')
                                ->content(fn($record) => new HtmlString('<i>Message:</i>  </br> ' . $record->message))
                                ->columnSpan(2),
                            Forms\Components\Placeholder::make('created_at')
                                ->label(' ')
                                ->content(fn($record) => new HtmlString('<small><i>Sent at:</i> ' . $record->created_at . '</small> ' ?? ''))
                                ->visible(fn($record) => $record?->created_at !== null)
                                ->columnSpan(2)
                        ])->extraAttributes(fn($record) => [
                            'class' => $record?->recipient?->name ? 'text-right' : 'text-left',
                        ])
                    ])
                    ->columns(2)
                    ->columnSpan(2)
                    ->disabled(),
                Forms\Components\RichEditor::make('content')->columnSpan(2)->label('Reply message')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                IconColumn::make('reply_status')
                    ->boolean()
                    ->falseIcon('heroicon-o-clock')
            ])
            ->filters([
                TernaryFilter::make('reply_status')
                    ->trueLabel('Replied')
                    ->falseLabel('Waiting')
                    ->queries(
                        true: fn(Builder $query) => $query->whereHas('messages', fn($subQuery) => $subQuery->whereNotNull('recipient_id')),
                        false: fn(Builder $query) => $query->whereDoesntHave('messages', fn($subQuery) => $subQuery->whereNotNull('recipient_id')),
                        blank: fn(Builder $query) => $query,
                    ),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListContactRequests::route('/'),
            'edit' => Pages\EditContactRequest::route('/{record}/edit'),
        ];
    }
}
