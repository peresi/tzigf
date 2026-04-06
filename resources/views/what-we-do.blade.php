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
                <p>Policy learning</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">What We Do</span>
                <h2>General Purpose</h2>
            </div>
            <div class="surface">
                <p>
                    The Tanzania Internet Governance Forum (TzIGF) serves as the national multistakeholder platform for inclusive dialogue on Internet and Digital Governance. Its core purpose is to provide an open, neutral, and participatory space where stakeholders from government, private sector, civil society, the technical community, academia, media, and the public can engage on public policy issues related to the development, use, and governance of the Internet.
                </p>
                <p>
                    Aligned with the principles of the Global Internet Governance Forum, TzIGF facilitates non-binding, multistakeholder dialogue that strengthens understanding, builds consensus, and promotes collaboration among diverse actors. In the Tanzanian context, it ensures that national Internet governance discussions reflect local realities, development priorities, and the lived experiences of citizens.
                </p>
                <p>
                    TzIGF plays a critical role in bridging global Internet governance processes with national priorities, enabling Tanzania to contribute meaningfully to regional and global discourse while ensuring that global developments are contextualized within the country's socio-economic and policy environment.
                </p>

                <h3>General Objectives</h3>
                <ol>
                    <li>
                        <strong>Facilitate Inclusive Multistakeholder Dialogue</strong>
                        <p>To provide a structured platform for dialogue among all stakeholders on Internet and Digital Governance issues, ensuring inclusive participation across sectors and communities, including youth, women, and underserved populations.</p>
                    </li>
                    <li>
                        <strong>Inform National Policy and Decision-Making</strong>
                        <p>To support evidence-based and participatory policy development by generating insights, recommendations, and perspectives that contribute to national ICT and digital governance frameworks.</p>
                    </li>
                    <li>
                        <strong>Promote Awareness and Understanding</strong>
                        <p>To enhance awareness and understanding of Internet governance issues, including digital rights, cybersecurity, data protection, and emerging technologies, among stakeholders and the general public.</p>
                    </li>
                    <li>
                        <strong>Strengthen Capacity and Participation</strong>
                        <p>To build the capacity of stakeholders to effectively engage in Internet governance processes at national, regional, and global levels, including through initiatives such as training, schools, and targeted engagement platforms.</p>
                    </li>
                    <li>
                        <strong>Identify Emerging Issues and National Priorities</strong>
                        <p>To identify and elevate emerging Internet and Digital Governance issues relevant to Tanzania, ensuring that they are addressed through dialogue and brought to the attention of appropriate institutions and stakeholders.</p>
                    </li>
                    <li>
                        <strong>Promote Digital Inclusion and Equity</strong>
                        <p>To advance equitable access to and use of the Internet by addressing barriers related to connectivity, affordability, digital literacy, and gender disparities, ensuring that no group is left behind in the digital transformation.</p>
                    </li>
                    <li>
                        <strong>Strengthen Linkages with Regional and Global Processes</strong>
                        <p>To contribute Tanzania's perspectives to regional and global Internet governance platforms, while also ensuring that global developments are reflected in national dialogue and policy discussions.</p>
                    </li>
                    <li>
                        <strong>Foster Collaboration and Partnerships</strong>
                        <p>To promote cooperation among stakeholders in addressing Internet governance challenges and leveraging digital opportunities for national development.</p>
                    </li>
                </ol>
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
