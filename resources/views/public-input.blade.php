@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">TzIGF 2026 Participation</p>
                <h1>Public Call for Input</h1>
                <p>
                    Share issues, challenges, and policy questions that should shape the agenda of the Tanzania Internet Governance Forum 2026.
                    Your submission helps the Secretariat build a bottom-up, multistakeholder programme.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>Submission Guidance</h3>
                <p>Provide a clear issue title and description.</p>
                <p>Explain why the issue matters for Tanzania now.</p>
                <p>Identify affected stakeholder groups.</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section" id="application-form">
        <div class="container">
            <div class="section-head">
                <span class="pill">Online Form</span>
                <h2>Public Input Submission Form</h2>
                <p>Complete all required fields to submit your issue proposal for TzIGF 2026.</p>
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
                <form method="POST" action="{{ route('public-input.submit') }}">
                    @csrf

                    <h3 style="margin-top:0;">Section 1: Basic Information</h3>
                    <div class="grid-2">
                        <div>
                            <label for="full_name" style="display:block; font-weight:600; margin-bottom:.35rem;">Full Name *</label>
                            <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="organization" style="display:block; font-weight:600; margin-bottom:.35rem;">Organization / Affiliation</label>
                            <input id="organization" name="organization" type="text" value="{{ old('organization') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="country" style="display:block; font-weight:600; margin-bottom:.35rem;">Country *</label>
                            <input id="country" name="country" type="text" value="{{ old('country') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="email" style="display:block; font-weight:600; margin-bottom:.35rem;">Email Address *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                    </div>

                    <h3>Section 2: Issue Proposal</h3>
                    <div>
                        <label for="issue_title" style="display:block; font-weight:600; margin-bottom:.35rem;">Title of the Issue *</label>
                        <input id="issue_title" name="issue_title" type="text" value="{{ old('issue_title') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                    </div>
                    <div style="margin-top:1rem;">
                        <label for="issue_description" style="display:block; font-weight:600; margin-bottom:.35rem;">Description of the Issue (200-300 words) *</label>
                        <textarea id="issue_description" name="issue_description" rows="7" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('issue_description') }}</textarea>
                    </div>

                    <h3>Section 3: Relevance</h3>
                    <div>
                        <label for="relevance_to_tanzania" style="display:block; font-weight:600; margin-bottom:.35rem;">Why is this issue important for Tanzania at this time? *</label>
                        <textarea id="relevance_to_tanzania" name="relevance_to_tanzania" rows="6" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('relevance_to_tanzania') }}</textarea>
                    </div>

                    <h3>Section 4: Policy Questions</h3>
                    <div>
                        <label for="policy_questions" style="display:block; font-weight:600; margin-bottom:.35rem;">What are the key policy questions that should be discussed? *</label>
                        <textarea id="policy_questions" name="policy_questions" rows="6" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('policy_questions') }}</textarea>
                    </div>

                    <h3>Section 5: Stakeholders</h3>
                    @php
                        $stakeholderOptions = ['Government / Policymakers', 'Private Sector', 'Civil Society', 'Technical Community', 'Academia / Research Institutions', 'Local Communities', 'Youth', 'Women', 'Journalists / Media'];
                        $selectedStakeholders = old('stakeholders', []);
                    @endphp
                    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                        @foreach($stakeholderOptions as $option)
                            <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                                <input type="checkbox" name="stakeholders[]" value="{{ $option }}" @checked(in_array($option, $selectedStakeholders, true)) style="width:auto; margin-top:.25rem;">
                                <span>{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>

                    <h3>Section 6: Consent</h3>
                    <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                        <input type="checkbox" name="consent" value="1" @checked(old('consent')) required style="width:auto; margin-top:.25rem;">
                        <span>I agree that my submission may be used for TzIGF programme development and public reporting. *</span>
                    </label>

                    <div style="margin-top:1.25rem;">
                        <button type="submit" class="btn btn-primary">Submit Public Input</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@include('partials.site-footer')
@endsection
