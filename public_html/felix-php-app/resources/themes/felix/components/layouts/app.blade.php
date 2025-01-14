<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme::partials.head', ['seo' => ($seo ?? null) ])
<body x-data>
    <x-header/>
    {{ $slot }}
    @include('theme::partials.footer', ['seo' => ($seo ?? null) ])
    
    <!-- Defer edilmiş JavaScript yüklemeleri -->
    <script src="/themes/felix/js/bootstrap.bundle.min.js" defer></script>
    <script src="/themes/felix/js/script.js" defer></script>
    
    <!-- Performans metrikleri için -->
    <script>
    if (window.performance && window.performance.mark) {
        window.performance.mark('first-contentful-paint');
        
        // First Input Delay ölçümü
        let firstInput = false;
        function onFirstInput(event) {
            if (!firstInput) {
                window.performance.mark('first-input');
                firstInput = true;
                ['click', 'keydown', 'scroll', 'touchstart'].forEach(type => {
                    document.removeEventListener(type, onFirstInput);
                });
            }
        }
        ['click', 'keydown', 'scroll', 'touchstart'].forEach(type => {
            document.addEventListener(type, onFirstInput);
        });
    }
    </script>
</body>
</html>
