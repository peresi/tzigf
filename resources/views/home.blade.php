@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        <div class="site-topbar">
            <div class="topbar-left">Established 2020</div>
            <div class="topbar-center">
                <div class="topbar-title">Tanzania Internet Governance Forum</div>
                <div class="topbar-subtitle">Building inclusive, multistakeholder internet policy for Tanzania</div>
            </div>
            <div class="topbar-right"><a href="mailto:info@tzigf.or.tz">info@tzigf.or.tz</a></div>
        </div>
        <div class="top-nav">
            <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false">☰</button>
            <a class="brand" href="#home" aria-label="Go to top">
                <img class="brand-logo" src="{{ asset('TZIGF OFFICIAL LOGO edit (1)_page-0001.jpg') }}" alt="TzIGF logo">
                <span class="sr-only">Tanzania IGF</span>
                <span class="brand-sub">Tanzania Internet Governance Forum</span>
            </a>
            <nav class="main-nav" aria-label="Main Navigation"></nav>
            <div class="nav-actions">
                <a class="nav-utility" href="{{ route('home') }}">Home</a>
                <a class="nav-utility" href="{{ route('tsig') }}">TzSIG</a>
                <a class="nav-utility" href="{{ route('tzmag') }}">TzMAG</a>
                <a class="nav-cta" href="{{ route('school.application') }}">Apply for Fellowship</a>
                <a class="nav-utility" href="{{ route('gallery') }}">Gallery</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a href="{{ route('admin.login') }}">Admin Login</a>
                @endauth
            </div>
        </div>

        <div class="hero" id="home">
            <div>
                <p class="eyebrow">Tanzania Internet Governance Forum</p>
                <h1>Connecting Grassroots Realities to National, Regional, and Global Internet Governance Processes</h1>
                <p>
                    The Tanzania Internet Governance Forum (TzIGF) is the national multistakeholder platform for dialogue on public policy issues related to the Internet and digital development.
                    It brings together government, regulators, private sector, civil society, academia, the technical community, media, youth, and citizens to exchange ideas,
                    build cooperation, and shape Tanzania’s digital future.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="#participate">TzSIG Fellowship application</a>
                    <a class="btn btn-secondary" href="{{ route('school.application') }}">TZIGF Fellowship application</a>
                    <a class="btn btn-secondary" href="#reports">View Reports</a>
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
    <section class="section alt" id="fellowship-call">
        <div class="container">
            <div class="section-head">
                <span class="pill">Call for Fellowship Applications</span>
                <h2>13th Tanzania Internet Governance Forum (TzIGF) 2026</h2>
                <p><strong>Date:</strong> May 2026 • <strong>Location:</strong> Holiday Inn Hotel, Dar es Salaam • <strong>Format:</strong> Hybrid</p>
            </div>

            <div class="surface">
                <p>
                    The Tanzania Internet Governance Forum (TzIGF) 2026 invites applications for fellowship support to enable inclusive and diverse
                    participation in the national multistakeholder dialogue on Internet and Digital Governance.
                </p>
                <p>
                    TzIGF serves as Tanzania’s National Initiative within the global Internet Governance Forum ecosystem. The Forum convenes
                    stakeholders from government, civil society, the technical community, academia and research institutions, the private sector,
                    media, youth, women, and community representatives to discuss policy, technical, social, and economic issues related to the Internet.
                </p>
                <p style="margin-bottom:0;">
                    The Fellowship Programme is designed to support individuals who demonstrate strong interest, commitment, and potential to contribute
                    meaningfully to national and international Internet governance processes.
                </p>
            </div>

            <div class="grid-2" style="margin-top:1rem;">
                <article class="card">
                    <h3>Fellowship Coverage (Subject to Availability of Support)</h3>
                    <ul class="list-clean">
                        <li>Event registration</li>
                        <li>Training/orientation session prior to the Forum</li>
                        <li>Lunch and refreshments</li>
                        <li>Travel support (limited and based on need)</li>
                        <li>Accommodation support (limited and based on need)</li>
                        <li>Certificate of Participation</li>
                    </ul>
                </article>

                <article class="card">
                    <h3>Eligibility Criteria</h3>
                    <ul class="list-clean">
                        <li>Be residents of Tanzania</li>
                        <li>Demonstrate interest in Internet governance issues</li>
                        <li>Commit to attending the full Forum</li>
                        <li>Demonstrate potential to contribute to discussions</li>
                        <li>Commit to post-forum engagement in their communities or institutions</li>
                    </ul>
                </article>
            </div>

            <div class="grid-2" style="margin-top:1rem;">
                <article class="card">
                    <h3>Selection Criteria</h3>
                    <ul class="list-clean">
                        <li>Motivation and clarity of impact</li>
                        <li>Stakeholder diversity</li>
                        <li>Gender balance</li>
                        <li>Regional representation</li>
                        <li>Youth inclusion</li>
                        <li>Institutional or community relevance</li>
                    </ul>
                </article>

                <article class="card">
                    <h3>Deadline</h3>
                    <p><strong>30th March 2026</strong></p>
                    <p style="margin:.5rem 0 0;">Rertad the criteria above and submit your fellowship application before the deadline.</p>
                    <div class="hero-actions" style="margin-top:.95rem;">
                        <a class="btn btn-primary" href="{{ route('school.application') }}" style="width:100%; text-align:center; font-weight:800; padding:.78rem 1rem;">Go to Application Registration Page</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">What We Do</span>
                <h2>Inclusive dialogue shaping Tanzania’s digital future</h2>
                <p>
                    Through open dialogue and inclusive participation, TzIGF ensures that Tanzania’s experiences contribute to regional and global Internet governance processes while international developments are reflected in national priorities.
                </p>
            </div>
            <div class="surface">
                <ul class="list-clean">
                    <li>Convene national Internet governance dialogue</li>
                    <li>Promote inclusive digital participation</li>
                    <li>Support policy awareness and cooperation</li>
                    <li>Elevate grassroots and youth voices</li>
                    <li>Feed Tanzania’s perspectives into regional and global arenas</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="about" class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">About TzIGF</span>
                <h2>National multistakeholder platform for Internet governance</h2>
            </div>
            <div class="grid-2">
                <article class="card">
                    <h3>What is Internet Governance?</h3>
                    <p>Internet governance refers to the development and application of shared principles, norms, rules, and decision-making processes that shape how the Internet evolves and is used.</p>
                </article>
                <article class="card">
                    <h3>About the Forum</h3>
                    <p>Since its establishment in 2009, TzIGF has served as Tanzania’s recognized space for multistakeholder engagement on Internet and digital governance matters. It promotes cooperation, strengthens trust, and supports informed decision-making.</p>
                </article>
            </div>
            <div class="surface" style="margin-top:1rem;">
                <h3 style="margin-top:0;">Why TzIGF Matters</h3>
                <p style="margin-bottom:0;">The Internet affects education, business, health, government services, innovation, and social interaction. TzIGF ensures that different voices can participate in shaping how these systems function.</p>
            </div>
        </div>
    </section>

    <section id="tigw" class="section">
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
                        <h4>Students’ Online Safety Education Dialogue</h4>
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
                <p style="margin-bottom:0;">Messages from each platform feed into the national forum and inform Tanzania’s contributions to regional and global Internet governance discussions.</p>
            </div>
        </div>
    </section>

    <section id="tzigf-2026" class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">TzIGF 2026</span>
                <h2>Theme and priorities for the next forum cycle</h2>
                <p><strong>Theme:</strong> To be announced</p>
            </div>

            <div class="grid-2">
                <article class="card">
                    <h3>Objectives</h3>
                    <ul class="list-clean">
                        <li>Provide inclusive dialogue</li>
                        <li>Strengthen multistakeholder cooperation</li>
                        <li>Elevate grassroots and youth perspectives</li>
                        <li>Promote safety and trust</li>
                        <li>Produce actionable outcomes</li>
                    </ul>
                </article>

                <article class="card">
                    <h3>Thematic Areas</h3>
                    <ul class="list-clean">
                        <li>Universal Access & Meaningful Connectivity</li>
                        <li>Artificial Intelligence & Emerging Technologies</li>
                        <li>Cybersecurity, Online Safety & Trust</li>
                        <li>Data Governance</li>
                        <li>Rights, Freedoms & Sustainability</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section id="participate" class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Participate</span>
                <h2>Join the process and shape digital governance outcomes</h2>
                <p>You can join TzIGF as:</p>
            </div>
            <ul class="ticks">
                <li>✔ Session organizer</li>
                <li>✔ Speaker</li>
                <li>✔ Youth participant</li>
                <li>✔ Student</li>
                <li>✔ Community representative</li>
                <li>✔ Partner or sponsor</li>
                <li>✔ Online participant</li>
            </ul>
            <p><strong>Registration information will be announced soon.</strong></p>
        </div>
    </section>

    <section id="reports" class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Reports</span>
                <h2>Evidence, recommendations, and outcomes by year</h2>
                <p>(Each item links to a downloadable report file)</p>
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
                <h3 style="margin-top:0;">What You’ll Find in Reports</h3>
                <ul class="list-clean">
                    <li>Programme overview</li>
                    <li>Speakers</li>
                    <li>Session summaries</li>
                    <li>Key recommendations</li>
                    <li>Participation statistics</li>
                    <li>Photos and highlights</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="partners" class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Partners & Supporters</span>
                <h2>Collaboration across sectors for digital progress</h2>
            </div>
            <div class="surface">
                <p style="margin:0;">TzIGF collaborates with public institutions, private sector actors, technical organizations, civil society groups, youth networks, and international partners committed to strengthening Tanzania’s digital future.</p>
            </div>
        </div>
    </section>

    <section id="media" class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Media & News</span>
                <h2>Latest announcements, updates, and outcomes</h2>
                <p>Find calls for participation, event coverage, and post-event outcomes.</p>
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
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}">
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

<footer id="contact">
    <div class="container">
        <h2>Contact</h2>
        <p>Tanzania Internet Governance Forum Secretariat</p>
        <p>📧 <a href="mailto:info@tzigf.or.tz">info@tzigf.or.tz</a></p>
        <p>🌐 <a href="https://www.tzigf.or.tz" target="_blank" rel="noopener">www.tzigf.or.tz</a></p>
        <p>Follow us on social media for updates.</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navLinks = Array.from(document.querySelectorAll('.main-nav a[href^="#"]'));

        if (!navLinks.length) {
            return;
        }

        const sectionMap = navLinks
            .map((link) => {
                const hash = link.getAttribute('href');

                if (!hash || hash === '#') {
                    return null;
                }

                const section = document.querySelector(hash);

                return section ? { link, section } : null;
            })
            .filter(Boolean);

        const setActiveLink = (activeLink) => {
            sectionMap.forEach(({ link }) => {
                const isActive = link === activeLink;

                link.classList.toggle('is-active', isActive);

                if (isActive) {
                    link.setAttribute('aria-current', 'page');
                } else {
                    link.removeAttribute('aria-current');
                }
            });
        };

        navLinks.forEach((link) => {
            link.addEventListener('click', () => setActiveLink(link));
        });

        if ('IntersectionObserver' in window && sectionMap.length) {
            const observer = new IntersectionObserver(
                (entries) => {
                    const visibleEntries = entries
                        .filter((entry) => entry.isIntersecting)
                        .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

                    if (!visibleEntries.length) {
                        return;
                    }

                    const activeSection = visibleEntries[0].target;
                    const active = sectionMap.find(({ section }) => section === activeSection);

                    if (active) {
                        setActiveLink(active.link);
                    }
                },
                {
                    root: null,
                    rootMargin: '-30% 0px -55% 0px',
                    threshold: [0.1, 0.2, 0.35, 0.5],
                }
            );

            sectionMap.forEach(({ section }) => observer.observe(section));
        }

        const currentHash = window.location.hash;
        const hashMatch = sectionMap.find(({ link }) => link.getAttribute('href') === currentHash);
        setActiveLink(hashMatch ? hashMatch.link : sectionMap[0].link);
    });
</script>
@endsection
