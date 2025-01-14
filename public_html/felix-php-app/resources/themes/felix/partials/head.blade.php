<head>
    @php
        if (isset($seo)) {
            $seo = (is_array($seo)) ? ((object) $seo) : $seo;
        }

        $locationName = isset($location_name) ? trim($location_name) : __('messages.your_city');
    @endphp

    <title>{{ __('messages.service_title') }} {{ $locationName }} - {{ __('messages.door_opening_24h', ['price' => '59']) }}</title>

    @if(isset($seo->title))
        <meta property="og:title" content="{{ $seo->title }}">
    @else
        <meta property="og:title" content="{{ __('messages.service_title') }} {{ $locationName }} 24h ✅ {{ __('messages.door_opening_fixed_price', ['price' => '59']) }}">
    @endif

    <!-- Meta Keywords -->
    <meta name="keywords" content="{{ __('messages.meta_keywords', ['location' => $locationName]) }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "{{ __('messages.service_title') }}",
          "name": "{{ __('messages.service_title') }} {{ $locationName }}",
          "description": "{{ __('messages.meta_description', ['location' => $locationName, 'phone' => '+49 176 23513191']) }}",
          "image": "https://www.felixschlusseldienst.de/themes/felix/images/banner-top.jpg.pagespeed.ce.DQZyGyRB2x.jpg",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "{{ $locationName }}",
            "addressCountry": "DE"
          },
          "telephone": "+49 176 23513191",
          "url": "{{ url()->current() }}",
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 52.5200,
            "longitude": 13.4050
          },
          "openingHoursSpecification": [
            {
              "@type": "OpeningHoursSpecification",
              "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
              ],
              "opens": "00:00",
              "closes": "23:59"
            }
          ]
        }
        </script>
<!-- Google Tag Manager -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.defer = true; // Ek performans optimizasyonu
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TGD9PSGS');
    });
</script>

<!-- Google Analytics -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var gtagScript = document.createElement('script');
        gtagScript.async = true;
        gtagScript.defer = true; // Ek performans optimizasyonu
        gtagScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-R75E2XBXEY';
        document.head.appendChild(gtagScript);

        gtagScript.onload = function () {
            // DataLayer başlatma ve Google Analytics yapılandırma
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', 'G-R75E2XBXEY', {
                'anonymize_ip': true, // GDPR uyumluluğu için
                'send_page_view': false // Otomatik pageview olaylarını önleyin
            });
        };
    });
</script>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">
    <meta name="description" content="{{ __('messages.meta_description', ['location' => $locationName, 'phone' => '+49 176 23513191']) }}">

    <!-- Language and Geo Tags -->
    <meta name="language" content="{{ app()->getLocale() }}">
    <meta name="geo.region" content="DE">
    <meta name="geo.placename" content="{{ $locationName }}">
    <meta name="geo.position" content="52.5200;13.4050">
    <meta name="ICBM" content="52.5200, 13.4050">

    <!-- Dinamik Open Graph Meta Etiketleri -->
    <meta property="og:title" content="{{ __('messages.service_title') }} {{ $locationName }} 24h ✅ {{ __('messages.door_opening_fixed_price', ['price' => '59']) }}">
    <meta property="og:description" content="{{ __('messages.meta_description', ['location' => $locationName, 'phone' => '+49 176 23513191']) }}">
    <meta property="og:image" content="https://www.felixschlusseldienst.de/themes/felix/images/banner-top.jpg.pagespeed.ce.DQZyGyRB2x.jpg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    @if(isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if(isset($seo->type)){{ $seo->type }}@else{{ 'article' }}@endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ ('site.title') }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if(isset($seo->image_w) && isset($seo->image_h))
            <meta property="og:image:width" content="{{ $seo->image_w }}">
            <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
    @endif

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('messages.service_title') }} {{ $locationName }} - {{ __('messages.door_opening_24h', ['price' => '59']) }}">
    <meta name="twitter:description" content="{{ __('messages.meta_description', ['location' => $locationName, 'phone' => '+49 176 23513191']) }}">
    <meta name="twitter:image" content="https://www.felixschlusseldienst.de/themes/felix/images/banner-top.jpg.pagespeed.ce.DQZyGyRB2x.jpg">

    @if(isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
    @endif

    @foreach ($localeWeblinks as $langCode => $localeUrl)
        <link rel="alternate" hreflang="{{ $langCode }}" href="{{ url('/' . $langCode . '/' . $localeUrl) }}" />
    @endforeach

    <!-- Critical CSS -->
    <style>
        /* Temel layout ve görünüm için kritik CSS */
        body {margin: 0; padding: 0; font-family: system-ui, -apple-system, sans-serif;}
        .navbar {background-color: #f8f9fa; padding: 0.5rem 1rem;}
        .container {width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; max-width: 1140px;}
        .logo-image {width: 80px; height: auto;}
        .btn-primary {background-color: #3921f5; border-color: #3921f5;}
        .text-success {color: #28a745 !important;}
        .img-fluid {max-width: 100%; height: auto;}
        .optimized-img {width: 100%; height: auto;}
        .carousel-item {min-height: 300px;}
    </style>

    <!-- Asenkron CSS Yükleme -->
    <link href="/themes/felix/css/bootstrap.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="/themes/felix/css/font-awesome.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="/themes/felix/css/style.css" media="print" onload="this.media='all'">

    <!-- Preload önemli görseller -->
    <link rel="preload" as="image" href="/themes/felix/images/felix-logo.webp">
    <link rel="preload" as="image" href="/themes/felix/images/felix-schluesseldienst-tueroeffnung-schluesselnotdiest.webp.pagespeed.ce.GYPwnDAFlv.webp">
    
    <!-- Preconnect önemli domainler -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://flagcdn.com">
    
</head>