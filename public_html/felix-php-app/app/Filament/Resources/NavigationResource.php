<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavigationResource\Pages;
use App\Models\Navigation;
use App\Models\WebLink;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Illuminate\Support\Str;
use Saade\FilamentAdjacencyList\Forms\Components\AdjacencyList;
use Filament\Forms\Get;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static ?string $navigationIcon = 'ionicon-menu';

    public static function getIconFromType(string $type): string
    {
        return match ($type) {
            'App\Models\Post' => 'Post',
            'App\Models\Taxonomy' => 'Taxonomy',
        };
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make(name: 'name')
                    ->columnSpan(2)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('call_name', Str::slug($state)))
                    ->disabled(fn(Get $get) => $get('system') === 1),
                Forms\Components\TextInput::make('call_name')
                    ->columnSpan(2)
                    ->disabled(fn(Get $get) => $get('system') === 1),
                AdjacencyList::make('navigation')
                    ->labelKey('item_title')
                    ->relationship('navigation_items')
                    ->childrenKey('navigation_item_children')
                    ->orderColumn('sort')
                    ->form([
                        Forms\Components\Radio::make('type')
                            ->options([
                                'on_site' => 'On Site',
                                'external' => 'External',
                            ])->inline()
                            ->default('on_site')
                            ->reactive(),
                        Forms\Components\Hidden::make('item_title'),
                        Forms\Components\Grid::make()
                            ->schema([
                                IconPicker::make('icon'),
                                Translate::make()->schema([
                                    TextInput::make('link_title')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (Set $set, mixed $state) {
                                            if (is_array($state)) {
                                                $set('item_title', $state[app()->getLocale()] ?? null);
                                            } elseif (is_string($state)) {
                                                $set('item_title', $state);
                                            }
                                        })->required(),
                                    TextInput::make('link_url')->required(),
                                ])->locales(['de','en','tr']),
                                Select::make('target')
                                    ->options([
                                        '_blank' => '_blank',
                                        '_self' => '_self',
                                        '_parent' => '_parent',
                                        '_top' => '_top',
                                    ])->required()->default('_self'),
                            ])->columns(1)
                            ->visible(fn(Get $get) => $get('type') === 'external'),
                        Forms\Components\Grid::make()
                            ->schema([
                                IconPicker::make('icon'),
                                Translate::make()->schema([
                                    TextInput::make('link_title')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (Set $set, mixed $state) {
                                            if (is_array($state)) {
                                                $set('item_title', $state[app()->getLocale()] ?? null);
                                            } elseif (is_string($state)) {
                                                $set('item_title', $state);
                                            }
                                        })->required(),
                                ])->locales(['de','en','tr']),
                                Select::make('link_target_on_site')
                                    ->getSearchResultsUsing(fn(string $search): array => WebLink::where('name', 'like', "%{$search}%")
                                        ->orWhere('title', 'like', "%{$search}%")
                                        ->limit(50)
                                        ->get()
                                        ->mapWithKeys(fn($webLink) => [
                                            $webLink->id => sprintf(
                                                '%s | %s',
                                                self::getIconFromType($webLink->web_linkable_type),
                                                e($webLink->title ?: $webLink->name)
                                            ),
                                        ])
                                        ->toArray()
                                    )
                                    ->options(WebLink::all()->mapWithKeys(fn($webLink) => [
                                        $webLink->id => sprintf(
                                            '%s | %s',
                                            self::getIconFromType($webLink->web_linkable_type),
                                            e($webLink->web_linkable->title ?: $webLink->web_linkable->name)
                                        ),
                                    ]))
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->extraAttributes(['escapeHtml' => false]),
                                Select::make('target')
                                    ->options([
                                        '_blank' => '_blank',
                                        '_self' => '_self',
                                        '_parent' => '_parent',
                                        '_top' => '_top',
                                    ])->required(),
                            ])->columns(1)
                            ->visible(fn(Get $get) => $get('type') === 'on_site'),
                    ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('call_name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('system')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListNavigations::route('/'),
            'create' => Pages\CreateNavigation::route('/create'),
            'edit' => Pages\EditNavigation::route('/{record}/edit'),
        ];
    }
}
