<nav class="navbar navbar-expand-lg bg-light py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/'.(App::getLocale())) }}">
            <img 
            src="{{ url('/themes/felix/images/felix-logo.webp') }}" 
            alt="Logo" 
            class="logo-image"
            width="80" 
            height="96" 
            >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Open the menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                @php
                    $nav = \App\Models\Navigation::where('call_name', 'header')->first();
                    $navItems = $nav ? $nav->navigation_items()->with('on_site_link')->get() : [];
                @endphp
                @foreach ($navItems as $item)
                    <li class="nav-item {{ !empty($item['children']) ? 'dropdown' : '' }}">
                        @php
                            $url = '';
                            if ($item->type === 'external') {
                                $url = $item->getTranslation('link_url', App::getLocale());
                            } elseif ($item->type === 'on_site' && $item->on_site_link) {
                                $url = $item->on_site_link->getTranslation('url', App::getLocale());
                            }
                        @endphp
                        <a class="nav-link {{ count($item['children'])>0 ? 'dropdown-toggle' : '' }}"
                           href="{{ url(App::getLocale() . '/' . $url) }}"
                           target="{{ $item->target }}"
                           @if(count($item['children'])>0) data-bs-toggle="dropdown" @endif>
                            {{ $item->item_title }}
                        </a>

                        @if (count($item['children'])>0)
                            <ul class="dropdown-menu">
                                @foreach ($item->navigation_item_children()->with('on_site_link')->get() as $child)
                                    @php
                                        $childUrl = '';
                                        if ($child->type === 'external') {
                                            $childUrl = $child->getTranslation('link_url', App::getLocale());
                                        } elseif ($child->type === 'on_site' && $child->on_site_link) {
                                            $childUrl = $child->on_site_link->getTranslation('url', App::getLocale());
                                        }
                                    @endphp
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ url(App::getLocale() . '/' . $childUrl) }}"
                                           target="{{ $child->target }}">
                                            {{ $child->item_title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>

            <!-- Dil Seçim ve WhatsApp Butonu -->
            <div class="d-flex align-items-center justify-content-center flex-wrap flex-lg-nowrap">
                <!-- Dil Seçici -->
                <div class="language-switcher me-3">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            @php
                                $languages = [
                                    'de' => ['name' => 'Deutsch', 'flag' => 'de'],
                                    'en' => ['name' => 'English', 'flag' => 'gb'],
                                    'tr' => ['name' => 'Türkçe', 'flag' => 'tr']
                                ];
                                $currentLang = $languages[app()->getLocale()];
                            @endphp
                            <img src="https://flagcdn.com/{{ $currentLang['flag'] }}.svg" alt="{{ $currentLang['name'] }}" class="me-1" style="width: 20px; height: auto;">
                            {{ $currentLang['name'] }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($languages as $code => $lang)
                                @if($code !== app()->getLocale())
                                    <li>
                                        @php
                                            $currentPath = request()->path();
                                            
                                            // Eğer sadece dil kodu varsa (anasayfa)
                                            if (in_array($currentPath, ['en', 'de', 'tr'])) {
                                                $newUrl = url($code);
                                            } else {
                                                // Mevcut URL'den dil kodunu ve slug'ı ayır
                                                $parts = explode('/', $currentPath);
                                                $currentLangCode = $parts[0];
                                                $currentSlug = $parts[1] ?? '';
                                                
                                                // WebLink'i bul
                                                $webLink = \App\Models\WebLink::whereRaw("JSON_EXTRACT(url, '$." . app()->getLocale() . "') = ?", [$currentSlug])->first();
                                                
                                                if ($webLink) {
                                                    // Hedef dildeki karşılığını al
                                                    $translatedSlug = $webLink->getTranslation('url', $code);
                                                    $newUrl = url($code . '/' . $translatedSlug);
                                                } else {
                                                    // WebLink bulunamazsa sadece dil kodunu değiştir
                                                    $newUrl = url($code . '/' . $currentSlug);
                                                }
                                            }
                                        @endphp
                                        <a class="dropdown-item" href="{{ $newUrl }}">
                                            <img src="https://flagcdn.com/{{ $lang['flag'] }}.svg" alt="{{ $lang['name'] }}" class="me-2" style="width: 20px; height: auto;">
                                            {{ $lang['name'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- WhatsApp Contact Button -->
                <a href="tel:{{ setting('site.phone.'.app()->getLocale()) }}" class="btn btn-light border d-flex align-items-center contact-button">
                    <i class="fab fa-whatsapp fa-2x text-success me-2"></i>
                    <span class="fw-bold">{{ __('24/7 Kontakt') }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>
