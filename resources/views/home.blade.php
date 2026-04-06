@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero" id="home">
            <div>
                <p class="eyebrow">Tanzania Internet Governance Forum</p>
                <h1>Connecting communities, institutions, and policy spaces in Tanzania's digital future</h1>
                <p>
                    TzIGF is Tanzania's national multistakeholder platform for dialogue on internet and digital governance.
                    The forum brings together government, private sector, civil society, academia, technical community, youth,
                    and citizens to shape inclusive national digital priorities.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ route('history') }}">Explore Our History</a>
                    <a class="btn btn-secondary" href="{{ route('what-we-do') }}">Explore What We Do</a>
                    <a class="btn btn-secondary" href="{{ route('reports.index') }}">Browse Reports</a>
                </div>
            </div>
            <aside class="hero-highlight">
                <h3>Upcoming Event</h3>
                <p><strong>13th Tanzania Internet Governance Forum 2026</strong></p>
                <p>📅 28 May 2026</p>
                <p>📍 Holiday Inn Hotel, Dar es Salaam</p>
                <p>🌐 Hybrid Participation</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Welcome</span>
                <h2>A clearer, easier-to-navigate TzIGF website</h2>
                <p>
                    The website is now organized into dedicated pages so visitors can quickly find background information,
                    programmes, reports, fellowship opportunities, and participation calls without scrolling through one long page.
                </p>
            </div>

            <div class="grid">
                <article class="card">
                    <h3>Our History</h3>
                    <p>Learn what TzIGF is, why it matters, and the role it plays in Tanzania's internet governance ecosystem.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('history') }}">Open Our History page</a></p>
                </article>
                <article class="card">
                    <h3>What We Do</h3>
                    <p>See the programmes, dialogue spaces, and participation channels that connect communities to policy discussions.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('what-we-do') }}">Open What We Do page</a></p>
                </article>
                <article class="card">
                    <h3>Reports</h3>
                    <p>Access annual documentation, outcomes, recommendations, and event records from previous TzIGF cycles.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('reports.index') }}">Open Reports page</a></p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">TzIGF 2026</span>
                <h2>Current participation calls</h2>
                <p>Use the TzIGF 2026 dropdown in the menu or go directly to the current calls below.</p>
            </div>

            <div class="grid">
                <article class="card">
                    <h3>Call for Public Input</h3>
                    <p>Share policy issues, agenda ideas, and national priorities that should shape the TzIGF 2026 programme.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('public-input.index') }}">Submit public input</a></p>
                </article>
                <article class="card">
                    <h3>TzIGF Fellowship</h3>
                    <p>Apply for fellowship support to participate in the Tanzania Internet Governance Forum 2026.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('school.application') }}">Open fellowship form</a></p>
                </article>
                <article class="card">
                    <h3>TzSIG Fellowship</h3>
                    <p>Apply to participate in the Tanzania School of Internet Governance fellowship programme.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('tsig') }}#application-form">Open TzSIG form</a></p>
                </article>
                <article class="card">
                    <h3>Call for Session Proposal</h3>
                    <p>Propose a session topic, speakers, and format for inclusion in the TzIGF 2026 agenda.</p>
                    <p style="margin-top:.75rem;"><a href="{{ route('session-proposal.index') }}">Submit proposal</a></p>
                </article>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Latest Reports</span>
                <h2>Recent documentation and outcomes</h2>
                <p>Quick access to the latest uploaded reports from the forum archive.</p>
            </div>

            <div class="grid">
                @forelse($reports as $report)
                    <article class="card">
                        <h3>{{ $report->title }}</h3>
                        <p>{{ $report->report_year ? 'Report year: ' . $report->report_year : 'Uploaded report' }}</p>
                        <p style="margin-top:.75rem;">
                            <a href="{{ route('reports.file', $report) }}" target="_blank" rel="noopener">Open report</a>
                        </p>
                    </article>
                @empty
                    <article class="card">
                        <p>No reports uploaded yet.</p>
                    </article>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Media & News</span>
                <h2>Latest updates from the forum</h2>
                <p>Announcements, coverage, and featured updates from recent TzIGF activities.</p>
            </div>

            <div class="media-list">
                @forelse($mediaNews as $item)
                    <article class="media-item">
                        <h3>{{ $item->title }}</h3>
                        <p><strong>{{ strtoupper($item->type) }}</strong>{{ $item->published_at ? ' • ' . $item->published_at->format('d M Y') : '' }}</p>
                        @if($item->body)
                            <p>{{ $item->body }}</p>
                        @endif
                        @if($item->external_url)
                            <p><a href="{{ $item->external_url }}" target="_blank" rel="noopener">Read more</a></p>
                        @endif
                    </article>
                @empty
                    <article class="media-item">
                        <p>No media or news has been published yet.</p>
                    </article>
                @endforelse
            </div>
        </div>
    </section>
</main>

@include('partials.site-footer')
@endsection
