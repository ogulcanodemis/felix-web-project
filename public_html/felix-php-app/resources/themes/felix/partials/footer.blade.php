@php
    $socialMedia=setting('social_media');
@endphp
<div class="mobile-call-button">
    <a href="tel:{{ setting('site.phone.'.app()->getLocale()) }}">
        <i class="fas fa-phone"></i>
        {{ __('messages.call_now') }}
    </a>
</div>
<div class="social-bar">
    <!-- Telefon İkonu -->
    <a href="tel:+4917623513191" class="social-icon phone" aria-label="{{ __('messages.phone_aria_label', ['phone' => '+49 176 23513191']) }}">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
            <g id="SVGRepo_iconCarrier"> <path d="M21 5.5C21 14.0604 14.0604 21 5.5 21C5.11378 21 4.73086 20.9859 4.35172 20.9581C3.91662 20.9262 3.69906 20.9103 3.50103 20.7963C3.33701 20.7019 3.18146 20.5345 3.09925 20.364C3 20.1582 3 19.9181 3 19.438V16.6207C3 16.2169 3 16.015 3.06645 15.842C3.12515 15.6891 3.22049 15.553 3.3441 15.4456C3.48403 15.324 3.67376 15.255 4.05321 15.117L7.26005 13.9509C7.70153 13.7904 7.92227 13.7101 8.1317 13.7237C8.31637 13.7357 8.49408 13.7988 8.64506 13.9058C8.81628 14.0271 8.93713 14.2285 9.17882 14.6314L10 16C12.6499 14.7999 14.7981 12.6489 16 10L14.6314 9.17882C14.2285 8.93713 14.0271 8.81628 13.9058 8.64506C13.7988 8.49408 13.7357 8.31637 13.7237 8.1317C13.7101 7.92227 13.7904 7.70153 13.9509 7.26005L13.9509 7.26005L15.117 4.05321C15.255 3.67376 15.324 3.48403 15.4456 3.3441C15.553 3.22049 15.6891 3.12515 15.842 3.06645C16.015 3 16.2169 3 16.6207 3H19.438C19.9181 3 20.1582 3 20.364 3.09925C20.5345 3.18146 20.7019 3.33701 20.7963 3.50103C20.9103 3.69907 20.9262 3.91662 20.9581 4.35173C20.9859 4.73086 21 5.11378 21 5.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
        </svg>
    </a>

    <!-- WhatsApp İkonu -->
    <a href="https://wa.me/4917623513191" class="social-icon whatsapp" aria-label="{{ __('messages.whatsapp_aria_label') }}" target="_blank">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
            <g id="SVGRepo_iconCarrier"> <path d="M6.014 8.00613C6.12827 7.1024 7.30277 5.87414 8.23488 6.01043L8.23339 6.00894C9.14051 6.18132 9.85859 7.74261 10.2635 8.44465C10.5504 8.95402 10.3641 9.4701 10.0965 9.68787C9.7355 9.97883 9.17099 10.3803 9.28943 10.7834C9.5 11.5 12 14 13.2296 14.7107C13.695 14.9797 14.0325 14.2702 14.3207 13.9067C14.5301 13.6271 15.0466 13.46 15.5548 13.736C16.3138 14.178 17.0288 14.6917 17.69 15.27C18.0202 15.546 18.0977 15.9539 17.8689 16.385C17.4659 17.1443 16.3003 18.1456 15.4542 17.9421C13.9764 17.5868 8 15.27 6.08033 8.55801C5.97237 8.24048 5.99955 8.12044 6.014 8.00613Z" fill="#ffffff"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 23C10.7764 23 10.0994 22.8687 9 22.5L6.89443 23.5528C5.56462 24.2177 4 23.2507 4 21.7639V19.5C1.84655 17.492 1 15.1767 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23ZM6 18.6303L5.36395 18.0372C3.69087 16.4772 3 14.7331 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C11.0143 21 10.552 20.911 9.63595 20.6038L8.84847 20.3397L6 21.7639V18.6303Z" fill="#ffffff"/> </g>
        </svg>
    </a>
</div>
<footer class="bg-light text-dark py-5 footer-mobile">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="text-center text-lg-start">
                    <img src="{{ url('/themes/felix/images/felix-logo-small.png') }}" alt="{{ __('messages.felix_logo') }}" loading="lazy"
                         class="img-fluid mb-3">
                    <p class="fw-bold mb-0">{{ __('messages.contact_us') }}</p>
                    <p>{{ setting('site.title.'.app()->getLocale()) }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> {{ setting('site.central_address.'.app()->getLocale()) }}</p>
                    <p><i class="fas fa-phone"></i> {{ setting('site.phone.'.app()->getLocale()) }}</p>
                    <p><i class="fas fa-envelope"></i> {{ setting('site.email.'.app()->getLocale()) }}</p>
                    <h6 class="fw-bold pt-2">{{ __('messages.payment_methods') }}</h6>
                    <div class="payment-icons mt-3">
                        <img src="{{ url('/themes/felix/images/Barzahlung.svg') }}" alt="{{ __('messages.cash_payment') }}" loading="lazy"
                             class="img-fluid me-2 p-2">
                        <img src="{{ url('/themes/felix/images/paypal-04.svg') }}" alt="Paypal" loading="lazy"
                             class="img-fluid me-2 p-2">
                        <img src="{{ url('/themes/felix/images/visa-classic-05.svg') }}" alt="Visa" loading="lazy"
                             class="img-fluid me-2 p-2">
                        <img src="{{ url('/themes/felix/images//mastercard-03.svg') }}" alt="Mastercard" loading="lazy"
                             class="img-fluid me-2 p-2">
                    </div>
                    <div class="payment-icons mt-3">
                        <img src="{{ url('/themes/felix/images/discover-02.svg') }}" alt="Discover" loading="lazy"
                             class="img-fluid me-2 p-2">
                        <img src="{{ url('/themes/felix/images/american-express-01.svg') }}" alt="Amex" loading="lazy"
                             class="img-fluid me-2 p-2">
                        <img src="{{ url('/themes/felix/images/electronic cash-06.svg') }}" alt="{{ __('messages.electronic_cash') }}" loading="lazy"
                             class="img-fluid me-2 p-2">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                @php
                    $nav=\App\Models\Navigation::where('call_name','footer')->first();
                    $navItems = $nav ? $nav->navigation_items : [];
                @endphp
                <ul class="list-unstyled">
                    @foreach ($navItems as $item)
                        <li>
                            <a href="{{url((App::getLocale()).'/'. (!empty($item['link_url'])?$item['link_url']:$item['on_site_link']['url']??'')) }}"
                               target="{{ $item['target'] }}">
                                {{ $item['item_title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <img src="{{ url('/themes/felix/images/24hours.webp') }}" alt="{{ __('messages.service_24h') }}" class="img-fluid" loading="lazy"
                         style="width: 100px;">
                    <img src="{{ url('/themes/felix/images/59euro.png') }}" alt="{{ __('messages.fixed_price') }}" class="img-fluid" loading="lazy"
                         style="width: 100px;">
                </div>
            </div>
            <!-- Abonelik ve Sosyal Medya -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>{{ __('messages.subscribe_text') }}</h5>
                <h6>{{ __('messages.follow_us') }}</h6>
                <div class="social-icons mt-3">
                    @foreach($socialMedia ?? [] as $key => $item)
                        <a href="{{ $item['social_media']['url'] }}" 
                           target="_blank" 
                           class="text-dark me-3" 
                           aria-label="{{ __('messages.visit_on_social', ['platform' => ucfirst($item['social_media']['name'])]) }}">
                            <i class="fab fa-{{ $item['social_media']['name'] }} fa-2x"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Alt Bilgi -->
        <div class="text-center mt-4">
            <p class="text-muted">{{ __('messages.copyright') }}</p>
        </div>
    </div>
</footer>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGD9PSGS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>