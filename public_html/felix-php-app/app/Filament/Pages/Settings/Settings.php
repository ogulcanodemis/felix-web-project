<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class Settings extends BaseSettings
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('Site')
                        ->schema([
                            FileUpload::make('site_logo')
                                ->image()
                                ->imageEditor()
                                ->columnSpan(2),
                            FileUpload::make('site_favicon')
                                ->image()
                                ->columnSpan(2),
                            Translate::make()
                                ->schema([
                                    TextInput::make('site.title')->columnSpan(2),
                                    Textarea::make('site.description')->columnSpan(2),
                                    TextInput::make('site.email')->email()->columnSpan(2),
                                    TextInput::make('site.phone')->tel()->columnSpan(2),
                                    Textarea::make('site.central_address')->columnSpan(2),
                                ])->locales(['de','tr','en'])
                                ->suffixLocaleLabel()
                                ->columnSpan(2),
                        ]),
                    Tabs\Tab::make('Social Media')->schema([
                        Repeater::make('social_media')->schema([
                            TextInput::make('social_media.name')->columnSpan(2),
                            TextInput::make('social_media.url')->columnSpan(2),
                        ])
                    ]),
                    Tabs\Tab::make('Locations')->schema([
                        Repeater::make('location')->schema([
                            TextInput::make('location.name')->columnSpan(2),
                            TextInput::make('location.coordinate')->columnSpan(2),
                        ])
                    ]),
                ])
        ];
    }
}
