<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Settings\Settings;
use App\Filament\Widgets\AccountWidget;
use App\Filament\Widgets\ContactRequestsChart;
use App\Filament\Widgets\LatestContactRequests;
use App\Filament\Widgets\LatestPosts;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\MenuItem;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use Filament\Navigation\NavigationGroup;
use SolutionForest\FilamentTranslateField\FilamentTranslateFieldPlugin;
use Outerweb\FilamentSettings\Filament\Plugins\FilamentSettingsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandLogoHeight('4rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->navigationGroups([
                NavigationGroup::make('blog')
                    ->icon('heroicon-o-pencil'),
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                AccountWidget::class,
                LatestPosts::class,
                LatestContactRequests::class,
                ContactRequestsChart::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentGoogleAnalytics\FilamentGoogleAnalyticsPlugin::make(),
                FilamentEditProfilePlugin::make()
                    ->shouldShowDeleteAccountForm(false)
                    ->shouldShowBrowserSessionsForm()
                    ->shouldShowAvatarForm()
                    ->shouldRegisterNavigation(false),
                FilamentTranslateFieldPlugin::make()->defaultLocales(['de', 'en', 'fr', 'tr']),
                FilamentSettingsPlugin::make()
                    ->pages([
                        Settings::class,
                    ]),
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Edit Profile')
                    ->url(fn(): string => EditProfilePage::getUrl())
                    ->icon('heroicon-o-user'),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
