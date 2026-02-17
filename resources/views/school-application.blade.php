@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        <div class="top-nav">
            <div class="brand">TzIGF</div>
            <nav class="main-nav" aria-label="Main Navigation">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('school.application') }}">School Application</a>
                <a href="{{ route('tsig') }}">TzSIG</a>
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
                <p class="eyebrow">Tanzania School of Internet Governance</p>
                <h1>Registration and Participation Application</h1>
                <p>
                    This page provides details on how to register for the School and how to submit an
                    application for participation when available seats are limited.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>Application Support</h3>
                <p>📧 info@tzigf.or.tz</p>
                <p>🌐 www.tzigf.or.tz</p>
                <p>📌 Selection may apply when demand is high.</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">How to Register</span>
                <h2>Standard registration process</h2>
            </div>
            <div class="surface">
                <ol class="list-clean">
                    <li>Watch for the official TzSIG call for applications on TzIGF communication channels.</li>
                    <li>Complete the registration/application form within the announced timeline.</li>
                    <li>Provide accurate personal and professional information, including your stakeholder category.</li>
                    <li>Submit a short statement of interest explaining why you want to participate in TzSIG.</li>
                    <li>Wait for confirmation and follow onboarding instructions shared by the Secretariat.</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Application Form</span>
                <h2>Submit your participation application</h2>
                <p>Complete the form below to register your interest in joining the Tanzania School of Internet Governance.</p>
            </div>

            @if(session('status'))
                <div class="surface" style="margin-bottom:1rem; border-color:#86efac; background:#f0fdf4;">
                    <p style="margin:0; color:#166534;"><strong>Success:</strong> {{ session('status') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="surface" style="margin-bottom:1rem; border-color:#fca5a5; background:#fef2f2;">
                    <p style="margin:.1rem 0 .5rem; color:#991b1b;"><strong>Please correct the following:</strong></p>
                    <ul class="list-clean" style="margin:0; color:#991b1b;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="surface">
                <form method="POST" action="{{ route('school.application.submit') }}">
                    @csrf

                    <div class="grid-2">
                        <div>
                            <label for="full_name" style="display:block; font-weight:600; margin-bottom:.35rem;">Full Name *</label>
                            <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="email" style="display:block; font-weight:600; margin-bottom:.35rem;">Email Address *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="phone" style="display:block; font-weight:600; margin-bottom:.35rem;">Phone Number</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="organization" style="display:block; font-weight:600; margin-bottom:.35rem;">Organization / Institution</label>
                            <input id="organization" name="organization" type="text" value="{{ old('organization') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="stakeholder_group" style="display:block; font-weight:600; margin-bottom:.35rem;">Stakeholder Group *</label>
                            <select id="stakeholder_group" name="stakeholder_group" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Select stakeholder group</option>
                                <option value="Youth" @selected(old('stakeholder_group') === 'Youth')>Youth</option>
                                <option value="Women" @selected(old('stakeholder_group') === 'Women')>Women</option>
                                <option value="Academia" @selected(old('stakeholder_group') === 'Academia')>Academia</option>
                                <option value="Civil Society" @selected(old('stakeholder_group') === 'Civil Society')>Civil Society</option>
                                <option value="Private Sector" @selected(old('stakeholder_group') === 'Private Sector')>Private Sector</option>
                                <option value="Technical Community" @selected(old('stakeholder_group') === 'Technical Community')>Technical Community</option>
                                <option value="Government" @selected(old('stakeholder_group') === 'Government')>Government</option>
                                <option value="Other" @selected(old('stakeholder_group') === 'Other')>Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="region" style="display:block; font-weight:600; margin-bottom:.35rem;">Region</label>
                            <input id="region" name="region" type="text" value="{{ old('region') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                    </div>

                    <div style="margin-top:.95rem;">
                        <label for="statement_of_interest" style="display:block; font-weight:600; margin-bottom:.35rem;">Statement of Interest *</label>
                        <textarea id="statement_of_interest" name="statement_of_interest" rows="6" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">{{ old('statement_of_interest') }}</textarea>
                        <p style="margin:.35rem 0 0; color:var(--muted); font-size:.9rem;">Minimum 50 characters. Explain your motivation and how you plan to apply TzSIG knowledge.</p>
                    </div>

                    <div style="margin-top:1rem; display:flex; gap:.65rem; flex-wrap:wrap;">
                        <button type="submit" class="btn" style="background:var(--primary); color:#fff; border-color:var(--primary);">Submit Application</button>
                        <a href="{{ route('home') }}" class="btn" style="border-color:var(--line); background:#fff; color:var(--text);">Back to Home</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Limited Participation</span>
                <h2>When seats are limited</h2>
                <p>
                    If applications exceed available places, participation is determined through a selection process
                    aligned with TzSIG inclusivity and quality principles.
                </p>
            </div>
            <div class="grid-2">
                <article class="card">
                    <h3>Selection Considerations</h3>
                    <ul class="list-clean">
                        <li>Stakeholder diversity and balanced representation</li>
                        <li>Inclusion of youth and women participants</li>
                        <li>Regional and institutional balance</li>
                        <li>Demonstrated interest in Internet governance</li>
                        <li>Potential to contribute to national and community dialogue</li>
                    </ul>
                </article>
                <article class="card">
                    <h3>After You Apply</h3>
                    <ul class="list-clean">
                        <li>Applications are reviewed by the organizing team.</li>
                        <li>Shortlisted applicants receive formal communication.</li>
                        <li>Final participants receive programme and logistics details.</li>
                        <li>Unsuccessful applicants are encouraged to apply in future editions.</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container">
            <div class="section-head">
                <span class="pill">Important Notes</span>
                <h2>Before submitting your application</h2>
            </div>
            <div class="surface">
                <ul class="ticks">
                    <li>✔ Submit your application before the official deadline.</li>
                    <li>✔ Ensure your contact details are correct for follow-up communication.</li>
                    <li>✔ Check your email regularly for updates from the Secretariat.</li>
                    <li>✔ Keep an eye on the website and social channels for announcement dates.</li>
                </ul>
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
        <p>For application support, contact the Secretariat using the details above.</p>
    </div>
</footer>
@endsection
