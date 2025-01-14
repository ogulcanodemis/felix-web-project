<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Register theme views
        View::addNamespace('theme', resource_path('themes/felix'));
        View::addNamespace('theme', resource_path('themes/felix/pages'));
        View::addNamespace('theme', resource_path('themes/felix/components'));
        
        // Register anonymous components
        \Illuminate\Support\Facades\Blade::anonymousComponentPath(resource_path('themes/felix/components'));
        
        // Set fallback view path
        View::addLocation(resource_path('themes/felix'));
    }
}
