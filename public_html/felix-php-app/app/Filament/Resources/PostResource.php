<?php

namespace App\Filament\Resources;

use App\Enums\PostCommentStatus;
use App\Enums\PostStatus;
use App\Filament\Exports\PostExporter;
use App\Filament\Imports\PostImporter;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\ImportAction;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'iconoir-page-edit';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')->columnSpan(2),
                    ]),
                Translate::make()
                    ->schema([
                        TextInput::make(name: 'title')->columnSpan(2)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state, TextInput $component) {
                                $name = $component->getName();
                                $locale = last(explode('.', $name));
                                $set("slug.$locale", Str::slug($state));
                            }),
                        TextInput::make('slug'),
                        Textarea::make('description')->columnSpan(2),
                        RichEditor::make('content')->columnSpan(2)
                    ])->locales(['de','en','tr'])
                    ->suffixLocaleLabel()
                    ->columnSpan(4),
                Grid::make()->columns(1)->schema([
                    Section::make()
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('thumbnail')
                                ->conversion('thumb')
                                ->image()
                                ->imageEditor(),
                            Select::make('status')
                                ->options(PostStatus::class)
                                ->default('published'),
                            Select::make('comment_status')->options(PostCommentStatus::class)->default('closed'),
                            SpatieTagsInput::make('tags'),
                        ]),
                    Section::make()
                        ->schema([
                            CheckboxList::make('Categories')
                                ->searchable()
                                ->relationship('categories', 'name'),
                        ])
                ])->columnSpan(2),
            ])->columns(6);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'post');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ImportAction::make()
                    ->importer(PostImporter::class)
            ])
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('author.name')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('author_id')
                    ->label('Author')
                    ->options(fn(): array => User::query()->pluck('name', 'id')->all()),
                SelectFilter::make('status')
                    ->options(PostStatus::class),
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
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(PostExporter::class)
                ])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
