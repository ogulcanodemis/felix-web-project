<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Taxonomy;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class CategoryResource extends Resource
{
    protected static ?string $model = Taxonomy::class;
    protected static ?string $modelLabel = 'Categories';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'carbon-category';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('parent_id')
                        ->label('Parent Category')
                        ->options(Taxonomy::where('term_id', 1)->pluck('name', 'id')),
                ]),
                Translate::make()
                    ->schema([
                        TextInput::make('name')->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state, TextInput $component) {
                                $name = $component->getName();
                                $locale = last(explode('.', $name));
                                $set("slug.$locale", Str::slug($state));
                            }),
                        TextInput::make('slug'),
                        Forms\Components\Textarea::make('description'),
                    ])->locales(['de','en','tr'])
                    ->suffixLocaleLabel()
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('parent_taxonomy.name')->searchable(),
                TextColumn::make('description')->limit(50),
                TextColumn::make('posts_count')->counts('posts')->badge(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Taxonomy::all()->pluck('name', 'id')),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
