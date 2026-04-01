@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">About TzIGF</p>
                <h1>National multistakeholder platform for internet governance in Tanzania</h1>
                <p>
                    TzIGF provides an open space where diverse stakeholders discuss internet policy, digital development,
                    safety, access, rights, innovation, and inclusion in Tanzania.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>Established</h3>
                <p><strong>2009</strong></p>
                <p>Recognized national dialogue space</p>
                <p>Inclusive and multistakeholder by design</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">About the Forum</span>
                <h2>Why TzIGF exists</h2>
            </div>
            <div class="grid-2">
                <article class="card">
                    <h3>What is Internet Governance?</h3>
                    <p>Internet governance refers to the development and application of shared principles, norms, rules, and decision-making processes that shape how the internet evolves and is used.</p>
                </article>
                <article class="card">
                    <h3>About TzIGF</h3>
                    <p>Since 2009, TzIGF has served as Tanzania's recognized space for multistakeholder engagement on internet and digital governance matters. It promotes cooperation, strengthens trust, and supports informed decision-making.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="surface">
                <h3 style="margin-top:0;">Why TzIGF Matters</h3>
                <p style="margin-bottom:0;">The internet affects education, business, health, government services, innovation, and social interaction. TzIGF ensures that different voices can participate in shaping how these systems function and how digital opportunities are shared.</p>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Partners & Supporters</span>
                <h2>Collaboration across sectors for digital progress</h2>
            </div>
            <div class="surface">
                <p style="margin:0;">TzIGF collaborates with public institutions, private sector actors, technical organizations, civil society groups, youth networks, academia, media, and international partners committed to strengthening Tanzania's digital future.</p>
            </div>
        </div>
    </section>
</main>

@include('partials.site-footer')
@endsection
