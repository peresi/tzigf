@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">Tanzania Internet Governance Forum</p>
                <h1>{{ $albumTitle }} Gallery</h1>
                <p>
                    Explore highlights from {{ $albumTitle }}. Click any photo to open it in Google Photos,
                    or use the button below to browse the full shared album collection.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ $albumUrl }}" target="_blank" rel="noopener">Open Full Album</a>
                    <a class="btn btn-secondary" href="{{ route('home') }}">Back to Home</a>
                </div>
            </div>
            <aside class="hero-highlight" id="album">
                <h3>Album Info</h3>
                <p><strong>Collection:</strong> {{ $albumTitle }}</p>
                <p><strong>Source:</strong> Google Photos</p>
                <p><strong>Access:</strong> Public shared link</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Photo Gallery</span>
                <h2>{{ $albumTitle }}</h2>
                <p>This gallery is synced from your shared album. Open individual photos or view the full collection in Google Photos.</p>
            </div>

            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
                @foreach($photos as $photo)
                    <article class="card">
                        <a href="{{ $photo['link'] }}" target="_blank" rel="noopener">
                            <img src="{{ $photo['image'] }}" alt="{{ $photo['title'] }}" style="width:100%; border-radius:10px; display:block; margin-bottom:.75rem; border:1px solid var(--line);">
                        </a>
                        <h3>{{ $photo['title'] }}</h3>
                        <p>
                            <a href="{{ $photo['link'] }}" target="_blank" rel="noopener">Open photo</a>
                        </p>
                    </article>
                @endforeach
            </div>

            <div class="surface" style="margin-top:1rem;">
                <h3 style="margin-top:0;">View all photos</h3>
                <p style="margin:.25rem 0 .9rem;">See the complete {{ $albumTitle }} album directly in Google Photos.</p>
                <a class="btn" style="background:var(--primary); color:#fff;" href="{{ $albumUrl }}" target="_blank" rel="noopener">Open Google Photos Album</a>
            </div>
        </div>
    </section>
</main>

@include('partials.site-footer')
@endsection
