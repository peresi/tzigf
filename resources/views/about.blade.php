@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">History of TzIGF</p>
                <h1>The history of Tanzania's multistakeholder internet governance platform</h1>
                <p>
                    The Tanzania Internet Governance Forum (TzIGF) has grown from an early national dialogue initiative
                    into Tanzania's principal multistakeholder platform for Internet and Digital Governance.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>Established</h3>
                <p><strong>2008</strong></p>
                <p>Revived in 2012 and revitalized in 2018</p>
                <p>12th edition expected in 2026</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Brief History</span>
                <h2>Tanzania Internet Governance Forum (TzIGF) - Brief History</h2>
            </div>
            <div class="surface">
                <p>
                    The Tanzania Internet Governance Forum (TzIGF) was established in 2008 as the National Internet
                    Governance Forum (NIGF), initially convened alongside the East Africa Internet Governance Forum to
                    situate Tanzania within regional and global Internet governance processes. The second edition was
                    held on 24 July 2009, co-organized by the Union of Tanzania Press Clubs (UTPC) and SwopNet chapters
                    in Mwanza and Dar es Salaam.
                </p>
                <p>
                    Following this early phase, the Forum experienced intermittent activity but was revived in 2012,
                    focusing on key national priorities including the National ICT Backbone, last-mile connectivity,
                    local content development, the role of social media in democracy, and the management of the
                    <strong>.tz</strong> domain.
                </p>
                <p>
                    After a subsequent period of inactivity, the Forum was revitalized in 2018, hosted by Kuza STEM
                    Generation (KsGEN), marking a renewed commitment to structured national dialogue on Internet
                    governance. Around this time, the platform transitioned from NIGF to Tanzania Internet Governance
                    Forum (TzIGF) to establish a clear national identity and avoid confusion with similar forums
                    globally.
                </p>
                <p>
                    A significant milestone was reached in 2019, when the Forum, alongside the Tanzania School of
                    Internet Governance (TzSIG), was supported by the Union of Tanzania Press Clubs and co-organized by
                    the Internet Society Tanzania Chapter and the Organization for Digital Africa. This period marked
                    the consolidation of TzIGF as both a dialogue and capacity-building platform.
                </p>
                <p>
                    The TzIGF Secretariat, composed of representatives from government, academia, civil society, the
                    technical community, and the private sector, is hosted by the Internet Society Tanzania Chapter,
                    reflecting the Forum's continued commitment to the multistakeholder model.
                </p>
                <h3>National, regional, and global relevance</h3>
                <p>
                    TzIGF operates within the global Internet governance ecosystem anchored by the United Nations
                    Internet Governance Forum, established following the World Summit on the Information Society (WSIS),
                    which provides a global platform for multistakeholder dialogue on public policy issues related to
                    the Internet.
                </p>
                <p>
                    Since its revitalization, TzIGF has evolved into a structured national process, integrating
                    capacity building, youth engagement, and innovation-driven participation through initiatives such as
                    the Tanzania School of Internet Governance (TzSIG), youth hackathons, and academic engagement
                    platforms.
                </p>
                <p style="margin-bottom:0;">
                    Today, TzIGF stands as Tanzania's principal multistakeholder platform for Internet and Digital
                    Governance, convening diverse stakeholders to deliberate on policy issues, strengthen national
                    capacity, and contribute to regional and global Internet governance processes. By 2026, the Forum
                    will have reached its 12th edition, reflecting a steady trajectory toward institutional maturity,
                    inclusivity, and policy relevance.
                </p>
            </div>
        </div>
    </section>
</main>

@include('partials.site-footer')
@endsection
