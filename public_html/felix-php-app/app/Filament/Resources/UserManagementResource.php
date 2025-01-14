<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserManagementResource\Pages;
use App\Filament\Resources\UserManagementResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserManagementResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $modelLabel = 'User Management';
    protected static ?string $pluralModelLabel = 'User Management';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required(fn (string $context): bool => $context === 'create')
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state)),
                    Forms\Components\Actions::make([
                        Forms\Components\Actions\Action::make('send_reset_password_link')
                            ->button()
                            ->action(function () use ($form) {

                            })
                    ]),
                ])
                    ->columns(1)
                    ->columnSpan(4),
                Forms\Components\Section::make()->schema([
                    Forms\Components\FileUpload::make('avatar_url')
                        ->image()
                        ->imageEditor(),
                    Forms\Components\Toggle::make('status'),
                ])
                    ->columns(1)
                    ->columnSpan(2),
            ])->columns(6);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                IconColumn::make('status')
                    ->boolean()
                    ->trueIcon('lineawesome-user-check-solid')
                    ->falseIcon('lineawesome-user-alt-slash-solid'),
                Tables\Columns\TextColumn::make('created_at'),
            ])
            ->filters([
                TernaryFilter::make('status')
                    ->trueLabel('Active')
                    ->falseLabel('Passive')
                    ->queries(
                        true: fn (Builder $query) => $query->whereNotNull('status'),
                        false: fn (Builder $query) => $query->whereNull('status'),
                        blank: fn (Builder $query) => $query,
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
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalDescription('Are you sure you want to delete this user? This action cannot be undone.')
                    ->modalSubmitActionLabel('Yes, delete')
                    ->modalCancelActionLabel('No, cancel'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalDescription('Are you sure you want to delete these users? This action cannot be undone.')
                        ->modalSubmitActionLabel('Yes, delete')
                        ->modalCancelActionLabel('No, cancel'),
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
            'index' => Pages\ListUserManagement::route('/'),
            'create' => Pages\CreateUserManagement::route('/create'),
            'edit' => Pages\EditUserManagement::route('/{record}/edit'),
        ];
    }
}
