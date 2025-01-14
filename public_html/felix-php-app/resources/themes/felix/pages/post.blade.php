<x-layouts.app>
    <main class="container my-5">
        <header class="text-center mb-4">
            <h1 class="fw-bold text-primary">{{ $post['title'] }}</h1>
            @php
                Carbon\Carbon::setLocale(app()->getLocale());
            @endphp
            <p class="text-muted">{{  Carbon\Carbon::parse($post['updated_at'])->isoFormat('LLLL') }}</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ url((App::getLocale()).'/') }}" class="text-decoration-none">{{ __('Startseite') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post['title'] }}</li>
                </ol>
            </nav>
        </header>
        <section class="row">
            <article class="col-lg-9 col-md-12 p-5">
                {!! $post['content'] !!}
            </article>
            <aside class="col-lg-3 col-md-12">

                @php
                    $categories= \App\Models\Taxonomy::where('term_id',1)->get();
                @endphp

                @if(!is_null($categories))
                    <section class="mb-4">
                        <h3>{{ __('Categories') }}</h3>
                        <ul class="list-group list-group-flush">

                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{ url((App::getLocale()).'/'.$category->slug[App::getLocale()]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                @endif

                @php
                    $tags=\App\Models\Post::find($post['id'])->tags->toArray();
                @endphp
                @if(!is_null($tags))
                    <section>
                        <h3>{{ __('Tags') }}</h3>
                        <section class="d-flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <span class="badge text-bg-primary">{{ $tag['name'] }}</span>
                            @endforeach
                        </section>
                    </section>
                @endif

                @php
                    $latestPages = \App\Models\Post::latest()->where('type','post')->take(5)->get();
                @endphp

                @if(!is_null($latestPages))
                    <section>
                        <h3>{{ __('Posts') }}</h3>

                        @foreach($latestPages as $latestPage)
                            <a href="{{ url((App::getLocale()).'/'.$latestPage->slug[App::getLocale()]) }}" class="text-decoration-none">
                                <div class="card mb-4">
                                    <img
                                        src="{{ $latestPage->media[0]->original_url ?? url('/themes/felix/images/felix-logo.png') }}"
                                        class="card-img-top"
                                        alt="{{ $latestPage->title }}"
                                    />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $latestPage->title }}</h5>
                                        <p class="card-text">{!! Str::limit(strip_tags($latestPage->content), 100) !!}</p>
                                        <span
                                            class="btn btn-primary mt-2">{{ __('Read More') }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </section>
                @endif
            </aside>
        </section>
    </main>
</x-layouts.app>
