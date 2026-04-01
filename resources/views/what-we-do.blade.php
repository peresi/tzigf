@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">What We Do</p>
                <h1>Inclusive dialogue, capacity building, and policy engagement</h1>
                <p>
                    TzIGF connects community realities, stakeholder priorities, and national digital policy conversations
                    through structured dialogue, participation pathways, and linked governance platforms.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>Core Focus</h3>
                <p>Dialogue</p>
                <p>Participation</p>
                <p>Policy learning and coordination</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">What We Do</span>
                <h2>Inclusive dialogue shaping Tanzania's digital future</h2>
                <p>Through open dialogue and inclusive participation, TzIGF ensures that Tanzania's experiences contribute to regional and global internet governance processes while international developments are reflected in national priorities.</p>
            </div>
            <div class="surface">
                <ul class="list-clean">
                    <li>Convene national internet governance dialogue</li>
                    <li>Promote inclusive digital participation</li>
                    <li>Support policy awareness and cooperation</li>
                    <li>Elevate grassroots and youth voices</li>
                    <li>Feed Tanzania's perspectives into regional and global arenas</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Tanzania Internet Governance Week</span>
                <h2>Multi-platform engagement from communities to policy spaces</h2>
                <p>TzIGF is implemented within a broader framework known as Tanzania Internet Governance Week (TIGW). The week expands participation across different segments of society so that community realities inform national dialogue.</p>
            </div>

            <div class="grid">
                @forelse($tigwItems as $item)
                    <article class="card">
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </article>
                @empty
                    <article class="card">
                        <h4>Youth Internet Governance Forum (Youth IGF)</h4>
                        <p>Youth-led discussions on opportunities, innovation, employment, participation, and rights.</p>
                    </article>
                    <article class="card">
                        <h4>Students' Online Safety Education Dialogue</h4>
                        <p>Engagement among students, teachers, parents, and protection stakeholders to promote digital citizenship, privacy awareness, and safer online learning environments.</p>
                    </article>
                    <article class="card">
                        <h4>Online Safety and Trust Women & Youth Symposium</h4>
                        <p>Focused exchange on resilience, empowerment, and trusted participation online.</p>
                    </article>
                    <article class="card">
                        <h4>Mtaa/Kijiji Internet Governance Congress</h4>
                        <p>Community consultations in villages and neighborhoods where citizens share lived experiences of connectivity, affordability, digital services, and risks.</p>
                    </article>
                    <article class="card">
                        <h4>Policymakers Roundtable on Internet & Digital Governance</h4>
                        <p>High-level discussions among leaders, regulators, legislators, and experts.</p>
                    </article>
                @endforelse
            </div>

            <div class="surface" style="margin-top:1rem;">
                <h3 style="margin-top:0;">How It Connects</h3>
                <p style="margin-bottom:0;">Messages from each platform feed into the national forum and inform Tanzania's contributions to regional and global internet governance discussions.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Participate</span>
                <h2>Join the process and shape digital governance outcomes</h2>
                <p>You can engage with TzIGF through multiple roles and platforms:</p>
            </div>
            <ul class="ticks">
                <li>Session organizer</li>
                <li>Speaker</li>
                <li>Youth participant</li>
                <li>Student</li>
                <li>Community representative</li>
                <li>Partner or sponsor</li>
                <li>Online participant</li>
            </ul>
            <p><strong>Registration information and participation calls are published under the TzIGF 2026 menu.</strong></p>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Media & News</span>
                <h2>Updates, announcements, and outcomes</h2>
                <p>Follow recent calls, stories, and coverage from the TzIGF ecosystem.</p>
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
