<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleFromUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $segments = $request->segments();
        $locale = $segments[0] ?? 'de';  // Default to German if no locale specified
        
        if (in_array($locale, ['de', 'en', 'tr'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('de');  // Fallback to German
        }

        return $next($request);
    }
}
