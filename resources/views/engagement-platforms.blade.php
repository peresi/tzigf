@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">TzIGF Engagement Platforms</p>
                <h1>Tanzania's connected platforms for Internet and digital governance dialogue</h1>
                <p>
                    The Tanzania Internet Governance Forum (TzIGF) convenes diverse stakeholders and connects engagement
                    platforms across youth, women, communities, media, policymakers, academia, and justice systems.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>What This Page Shows</h3>
                <p>How TzIGF works as a national multistakeholder platform.</p>
                <p>The role of each engagement platform.</p>
                <p>How outputs are linked to regional and global processes.</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Overview</span>
                <h2>Tanzania Internet Governance Forum (TzIGF)</h2>
                <p>
                    TzIGF is the national multistakeholder platform for Internet and Digital Governance dialogue in Tanzania.
                    It convenes government, private sector, civil society, technical community, academia and research institutions,
                    media, and the general public. It serves as the central aggregation platform where inputs from all engagement
                    platforms are consolidated into national outcomes and communicated to regional and global Internet governance processes.
                </p>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Platforms</span>
                <h2>Engagement Platforms and Their Focus</h2>
                <p>Each platform creates a targeted participation pathway while contributing to one national governance conversation.</p>
            </div>

            <div class="grid">
                <article class="card">
                    <h4>Tanzania Youth Internet Governance Forum (TzYIGF)</h4>
                    <p>Dedicated platform for young people focusing on online safety, security and trust, innovation, and youth participation in policymaking.</p>
                </article>
                <article class="card">
                    <h4>Tanzania Women Internet Governance Forum (TzWIGF)</h4>
                    <p>Addresses the digital gender gap by creating space for women to engage in digital policy discussions, online safety, and leadership in Internet governance.</p>
                </article>
                <article class="card">
                    <h4>Students Internet Governance Forum (SIGF)</h4>
                    <p>Introduces students to Internet governance, with focus on digital responsibility, safety, and early participation in governance processes.</p>
                </article>
                <article class="card">
                    <h4>Kijiji &amp; Mtaa Internet Governance Forum (KMIGF)</h4>
                    <p>Engages citizens at grassroots level so community perspectives inform national Internet governance discussions.</p>
                </article>
                <article class="card">
                    <h4>Journalists Symposium on Internet Governance (JSIG)</h4>
                    <p>Builds capacity for media practitioners to report accurately on Internet governance while addressing misinformation and digital ethics.</p>
                </article>
                <article class="card">
                    <h4>Tanzania Policymakers Roundtable on Internet Governance (TzPRIG)</h4>
                    <p>Brings together policymakers for structured dialogue on Internet and Digital Governance, focusing on advice, reflection, and action.</p>
                </article>
                <article class="card">
                    <h4>Tanzania School of Internet Governance (TzSIG)</h4>
                    <p>Capacity-building platform that has trained 786 fellows and reached 8,240 individuals through outreach, strengthening participation in Internet governance.</p>
                </article>
                <article class="card">
                    <h4>Universities and Colleges Network on Internet Governance (UCNIG)</h4>
                    <p>Connects academic institutions to Internet governance processes, giving students stronger exposure and participation opportunities.</p>
                </article>
                <article class="card">
                    <h4>Judiciary Global Dialogue on Internet and Digital Governance - Tanzania Chapter</h4>
                    <p>Brings together judges and legal scholars to address legal and jurisprudential issues related to the digital environment.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="surface">
                <h3 style="margin-top:0;">How the Platforms Connect</h3>
                <p style="margin-bottom:0;">
                    Inputs from these platforms are consolidated through TzIGF into national outcomes and then communicated to
                    regional and global Internet governance spaces. This ensures local priorities shape broader governance dialogue.
                </p>
            </div>
        </div>
    </section>
</main>

@include('partials.site-footer')
@endsection
