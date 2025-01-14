<?php

use App\Models\WebLink;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// Ana sayfa route'u
Route::view('/', 'theme::pages.index', ['localeWeblinks' => array_combine(['de', 'en', 'tr'], ['', '', ''])])
    ->middleware([
        \App\Http\Middleware\ShareRouteData::class,
        \App\Http\Middleware\SetLocaleFromUrl::class
    ]);

// Old URL routes (without language prefix)
$webLinksIndex = WebLink::with('web_linkable')->where('type', '=', 'old_url')->get();
foreach ($webLinksIndex as $webLinkIndex) {
    $localizedUrl = $webLinkIndex->getTranslation('url', 'de');
    if ($localizedUrl) {
        Route::view(
            $localizedUrl,
            'theme::pages.location',
            [
                'location_name' => $webLinkIndex->name,
                'localeWeblinks' => []
            ]
        )->middleware([
            \App\Http\Middleware\ShareRouteData::class,
        ]);
    }
}

// Multi-language routes
$languages = ['de', 'en', 'tr'];
foreach ($languages as $lang) {
    Route::group(['prefix' => $lang, 'as' => "{$lang}.", 'middleware' => ['web']], function () use ($lang) {
        // Home page for each language
        Route::view('/', 'theme::pages.index', ['localeWeblinks' => array_combine(['de', 'en', 'tr'], ['', '', ''])])
            ->middleware([
                \App\Http\Middleware\ShareRouteData::class,
                \App\Http\Middleware\SetLocaleFromUrl::class
            ]);

        // Base routes for each language (menu items)
        $webLinksBase = WebLink::with('web_linkable')->where('type', '=', 'base')->get();
        foreach ($webLinksBase as $webLink) {
            $localizedUrl = $webLink->getTranslation('url', $lang);
            if ($localizedUrl) {
                $viewName = 'theme::pages.' . ($webLink->web_linkable_type === 'App\\Models\\Post' ? 'page' : 'location');
                Route::view(
                    $localizedUrl,
                    $viewName,
                    [
                        'page' => $webLink->web_linkable,
                        'location_name' => $webLink->name,
                        'localeWeblinks' => $webLink->getTranslations('url')
                    ]
                )->middleware([
                    \App\Http\Middleware\ShareRouteData::class,
                    \App\Http\Middleware\SetLocaleFromUrl::class
                ]);
            }
        }

        // Location routes for each language
        $webLinksLocation = WebLink::with('web_linkable')->where('type', '=', 'location')->get();
        foreach ($webLinksLocation as $webLink) {
            $localizedUrl = $webLink->getTranslation('url', $lang);
            if ($localizedUrl) {
                Route::view(
                    $localizedUrl,
                    'theme::pages.location',
                    [
                        'location_name' => $webLink->name,
                        'localeWeblinks' => $webLink->getTranslations('url')
                    ]
                )->middleware([
                    \App\Http\Middleware\ShareRouteData::class,
                    \App\Http\Middleware\SetLocaleFromUrl::class
                ]);
            }
        }
    });
}

// Sitemap route
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();
    $webLinksIndex = WebLink::with('web_linkable')->where('type', '=', 'old_url')->get();

    foreach ($webLinksIndex as $webLinkIndex) {
        $firstDayOfWeek = new DateTime('monday this week');

        $sitemap->add(
            Url::create($webLinkIndex->getTranslation('url', 'de'))
                ->setLastModificationDate($firstDayOfWeek)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );
    }

    $languages = ['de'];

    if (Schema::hasTable('web_links')) {
        $webLinks = App\Models\WebLink::with('web_linkable')->where('type', '!=', 'old_url')->get();

        foreach ($languages as $lang) {
            $firstDayOfWeek = new DateTime('monday this week');

            $sitemap->add(
                Url::create("/$lang/")
                    ->setLastModificationDate($firstDayOfWeek)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.8)
            );

            foreach ($webLinks as $webLink) {
                $localizedUrl = $webLink->getTranslation('url', $lang);
                if ($localizedUrl) {
                    $sitemap->add(
                        Url::create("/$lang/$localizedUrl")
                            ->setLastModificationDate($webLink->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.8)
                    );
                }
            }
        }
    }

    return $sitemap->toResponse(request());
});
