<div class="container-fluid bg-light py-2 top-header-container">
    <div class="row align-items-center text-center text-lg-start">
        <!-- WhatsApp Icon and Text -->
        <div class="col-lg-12 col-md-6 col-sm-12 d-flex align-items-center justify-content-center mb-3 mb-lg-0">
            <i class="fab fa-whatsapp text-success me-2 mobile-wp-button"></i>

            <span class="fw-bold">{{ __('messages.contact_24_7') }}</span>

            <span class="mx-4">{{ __('messages.emergency_service_near_you') }}</span>

            <span class="arrow ms-3">→</span>

            <a href="tel:{{ setting('site.phone.'.app()->getLocale()) }}" >
                <img src="{{ url('/themes/felix/images/phone-number.png') }}" alt="{{ __('messages.phone_number') }}"  width="100" height="50" class="mx-4 top-header-phone-number">
            </a>

            <span>{!! __('messages.arrival_time_html') !!}</span>
        </div>
    </div>
</div>
