<x-layouts.app>

    <x-header/>
    <section class="container my-5">
        <section class="text-center">
            <h1>{{ $archive['name'] }}</h1>
            <p>{{ $archive['description'] }}</p>
        </section>
        @php
            $posts = \App\Models\Taxonomy::find($archive['id'])
            ->posts()
            ->where('type', 'post')
            ->paginate(12)->onEachSide(1);
        @endphp
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($posts as $post)
                <div class="col">
                    <a href="{{ url((App::getLocale()).'/'.$post->web_links[0]->url) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <img
                                src="{{ $post->media[0]->original_url ?? url('/themes/felix/images/felix-logo.png') }}"
                                class="card-img-top"
                                alt="{{ $post->title }}"
                            />
                            <div class="card-body">
                                <h5 class="card-title text-dark">{{ $post->title }}</h5>
                                <p class="card-text text-dark">{!! Str::limit(strip_tags($post->content), 100) !!}</p>
                                <span
                                   class="btn btn-primary mt-2">{{ __('Read More') }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-4 d-flex justify-content-center">{{ $posts->links('pagination::bootstrap-4') }}</div>
    </section>
</x-layouts.app>
