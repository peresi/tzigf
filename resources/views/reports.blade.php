@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">Reports</p>
                <h1>Evidence, recommendations, and outcomes by year</h1>
                <p>
                    Browse the TzIGF report archive to review programme documentation, recommendations,
                    participation statistics, and session outcomes from previous cycles.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>What You'll Find</h3>
                <p>Programme overviews</p>
                <p>Session summaries</p>
                <p>Key recommendations and highlights</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Archive</span>
                <h2>TzIGF Reports Library</h2>
                <p>Each item opens the uploaded report file.</p>
            </div>

            <ul class="reports">
                @forelse($reports as $report)
                    <li>
                        <a href="{{ route('reports.file', $report) }}" target="_blank" rel="noopener">
                            {{ $report->title }}{{ $report->report_year ? ' (' . $report->report_year . ')' : '' }}
                        </a>
                    </li>
                @empty
                    <li>No reports uploaded yet.</li>
                @endforelse
            </ul>

            <div class="surface" style="margin-top:1rem;">
                <h3 style="margin-top:0;">Report Contents</h3>
                <ul class="list-clean">
                    <li>Programme overview</li>
                    <li>Speakers and participants</li>
                    <li>Session summaries</li>
                    <li>Key recommendations</li>
                    <li>Participation statistics</li>
                    <li>Photos and event highlights</li>
                </ul>
            </div>
        </div>
    </section>
</main>

@include('partials.site-footer')
@endsection
