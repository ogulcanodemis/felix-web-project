<x-layouts.app>
    <main class="container my-5">
        <header class="text-center mb-4">
            <h1 class="fw-bold text-primary">{{ $page['title'] }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ url((App::getLocale()).'/') }}" class="text-decoration-none">{{ __('Startseite') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page['title'] }}</li>
                </ol>
            </nav>
        </header>
        <section>
            <article class="p-5">
                {!! $page['content'] !!}
            </article>
        </section>
    </main>
</x-layouts.app>
