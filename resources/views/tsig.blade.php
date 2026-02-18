@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        <div class="top-nav">
            <div class="brand">TzIGF</div>
            <nav class="main-nav" aria-label="Main Navigation">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#tigw">TIGW</a>
                <a href="{{ route('home') }}#reports">Reports</a>
                <a href="{{ route('home') }}#media">Media</a>
                <a href="{{ route('home') }}#contact">Contact</a>
                <a href="{{ route('tsig') }}">TzSIG</a>
                <a href="{{ route('school.application') }}">Apply for fellowship TzIGF 2026</a>
                <a href="{{ route('gallery') }}">Gallery</a>
                @auth
                    <a class="nav-cta" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a class="nav-cta" href="{{ route('admin.login') }}">Admin Login</a>
                @endauth
            </nav>
        </div>

        <div class="hero">
            <div>
                <p class="eyebrow">Tanzania Internet Governance Forum</p>
                <h1>Tanzania School of Internet Governance (TzSIG)</h1>
                <p>
                    A national capacity-development platform that prepares current and emerging leaders
                    to engage effectively in Internet governance dialogue and policy processes.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>TzSIG at a Glance</h3>
                <p><strong>Established:</strong> 2020</p>
                <p><strong>Editions completed:</strong> 6 (2020–2025)</p>
                <p><strong>Participants trained:</strong> 700+</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Background and History</span>
                <h2>Institutional growth of TzSIG</h2>
            </div>

            <div class="surface">
                <p>
                    The Tanzania School of Internet Governance (TzSIG) was established in 2020 as a national
                    capacity-development initiative within the Tanzania Internet Governance Forum (TzIGF) framework.
                    The School was created to strengthen informed and effective participation in Internet governance
                    processes by building foundational and advanced knowledge among diverse stakeholder groups.
                </p>
                <p>
                    Since its inaugural edition in 2020, TzSIG has been convened annually and has completed six
                    editions between 2020 and 2025. Over this period, the School has trained more than 700 individuals
                    from across Tanzania and awarded Certificates in Internet Governance to successful participants.
                </p>
                <p>
                    The implementation of TzSIG has been supported by key partners, including the ISOC Foundation,
                    Organization for Digital Africa, and Zaina Foundation. Their support has contributed to the
                    institutional strengthening and sustainability of the School.
                </p>
                <p style="margin-bottom:0;">
                    Over successive editions, TzSIG has evolved into a structured national platform for preparing
                    current and emerging leaders to engage meaningfully in Internet governance discussions at national,
                    regional, and global levels.
                </p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Purpose</span>
                <h2>Strengthening national multistakeholder IG engagement</h2>
            </div>
            <div class="surface">
                <p style="margin:0;">
                    The purpose of the Tanzania School of Internet Governance (TzSIG) is to strengthen the national
                    multistakeholder Internet governance ecosystem by equipping participants with the knowledge,
                    analytical skills, and practical understanding necessary for effective engagement in Internet
                    governance processes. The School enhances the quality, inclusivity, and sustainability of dialogue
                    within the Tanzania IGF framework while not exercising decision-making authority.
                </p>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Objectives</span>
                <h2>Core outcomes of the School</h2>
            </div>
            <div class="surface">
                <ul class="list-clean" style="margin:0;">
                    <li>Build foundational and advanced understanding of Internet governance principles, institutions, and policy processes.</li>
                    <li>Strengthen comprehension of the multistakeholder model and its practical application at national, regional, and global levels.</li>
                    <li>Develop analytical, negotiation, and policy communication skills among participants.</li>
                    <li>Prepare participants to contribute effectively to Tanzania IGF, regional IGF initiatives, and global Internet governance processes.</li>
                    <li>Promote inclusive participation by ensuring representation of youth, women, academia, civil society, the private sector, the technical community, and government actors.</li>
                    <li>Establish and sustain a national pool of trained Internet governance practitioners and future leaders.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Strategic Role</span>
                <h2>Within Tanzania Internet Governance Week</h2>
            </div>
            <div class="surface">
                <p style="margin:0;">
                    Within the Tanzania Internet Governance Week architecture, TzSIG serves as the
                    capacity-development pipeline that strengthens the depth and effectiveness of engagement across
                    all stakeholder platforms. By preparing participants prior to major dialogue processes,
                    the School contributes to informed, constructive, and policy-relevant discussions.
                </p>
            </div>
        </div>
    </section>
</main>

<footer id="contact">
    <div class="container">
        <h2>Contact</h2>
        <p>Tanzania Internet Governance Forum Secretariat</p>
        <p>📧 <a href="mailto:info@tzigf.or.tz">info@tzigf.or.tz</a></p>
        <p>🌐 <a href="https://www.tzigf.or.tz" target="_blank" rel="noopener">www.tzigf.or.tz</a></p>
        <p>Follow us on social media for updates.</p>
    </div>
</footer>
@endsection
