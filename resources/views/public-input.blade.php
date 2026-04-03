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

                    <h3 style="margin-top:0;">Section 1: Respondent Information</h3>
                    <div class="grid-2">
                        <div>
                            <label for="submission_type" style="display:block; font-weight:600; margin-bottom:.35rem;">Submission Type *</label>
                            <select id="submission_type" name="submission_type" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                                <option value="">Select submission type</option>
                                <option value="Individual" @selected(old('submission_type') === 'Individual')>Individual</option>
                                <option value="Organization" @selected(old('submission_type') === 'Organization')>Organization</option>
                            </select>
                        </div>
                        <div>
                            <label for="full_name" style="display:block; font-weight:600; margin-bottom:.35rem;">Full Name *</label>
                            <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="organization" style="display:block; font-weight:600; margin-bottom:.35rem;">Organization (if applicable)</label>
                            <input id="organization" name="organization" type="text" value="{{ old('organization') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="stakeholder_group" style="display:block; font-weight:600; margin-bottom:.35rem;">Stakeholder Group Type: *</label>
                            <select id="stakeholder_group" name="stakeholder_group" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                                <option value="">Select stakeholder group</option>
                                <option value="Government" @selected(old('stakeholder_group') === 'Government')>Government</option>
                                <option value="Private Sector" @selected(old('stakeholder_group') === 'Private Sector')>Private Sector</option>
                                <option value="Civil Society" @selected(old('stakeholder_group') === 'Civil Society')>Civil Society</option>
                                <option value="Technical Community" @selected(old('stakeholder_group') === 'Technical Community')>Technical Community</option>
                                <option value="Academia / Research" @selected(old('stakeholder_group') === 'Academia / Research')>Academia / Research</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" style="display:block; font-weight:600; margin-bottom:.35rem;">Email Address *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="whatsapp_number" style="display:block; font-weight:600; margin-bottom:.35rem;">WhatsApp Number</label>
                            <input id="whatsapp_number" name="whatsapp_number" type="text" value="{{ old('whatsapp_number') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="region" style="display:block; font-weight:600; margin-bottom:.35rem;">Region in Tanzania *</label>
                            <input id="region" name="region" type="text" value="{{ old('region') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                    </div>

                    <h3>Section 2: Thematic Areas</h3>
                    <p style="margin-top:.1rem; margin-bottom:.75rem;">Which thematic area(s) should TzIGF 2026 focus on? Select up to 3.</p>
                    @php($selectedThematicAreas = old('thematic_areas', []))
                    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                        @foreach([
                            'Universal Access & Meaningful Connectivity',
                            'Digital Literacy, Capacity Building & Inclusion',
                            'Cybersecurity, Trust & Online Safety',
                            'Artificial Intelligence & Emerging Technologies Governance',
                            'Data Protection, Privacy & Digital Rights',
                            'Digital Economy, Innovation & Local Content',
                        ] as $option)
                            <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                                <input type="checkbox" name="thematic_areas[]" value="{{ $option }}" @checked(in_array($option, $selectedThematicAreas, true)) style="width:auto; margin-top:.25rem;">
                                <span>{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>

                    <h3>Section 3: Priority Issues</h3>
                    <div>
                        <label for="priority_issues" style="display:block; font-weight:600; margin-bottom:.35rem;">From the selected thematic area(s), what specific issues should be prioritized? *</label>
                        <textarea id="priority_issues" name="priority_issues" rows="6" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('priority_issues') }}</textarea>
                    </div>

                    <h3>Section 4: Additional Input</h3>
                    <div>
                        <label for="additional_input" style="display:block; font-weight:600; margin-bottom:.35rem;">Are there any other emerging issues or challenges that TzIGF should consider?</label>
                        <textarea id="additional_input" name="additional_input" rows="5" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('additional_input') }}</textarea>
                    </div>

                    <h3>Section 5: Implementation &amp; Impact</h3>
                    <div>
                        <label for="implementation_impact" style="display:block; font-weight:600; margin-bottom:.35rem;">How can TzIGF contribute to implementation of national and global digital priorities (e.g., TNBS, Digital Economy Strategy, WSIS, GDC, SDGs)? *</label>
                        <textarea id="implementation_impact" name="implementation_impact" rows="6" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('implementation_impact') }}</textarea>
                    </div>

                    <h3>Section 6: Programme Design</h3>
                    <p style="margin-top:.1rem; margin-bottom:.75rem;">What suggestions do you have for the design of TzIGF 2026? Select all that apply.</p>
                    @php($selectedProgrammeDesign = old('programme_design', []))
                    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                        @foreach([
                            'Workshops',
                            'Panel Discussions',
                            'Roundtables (e.g., Policymakers Roundtable)',
                            'Lightning Talks',
                            'Community Dialogues (Kijiji/Mtaa level)',
                            'Hybrid (Online + Physical)',
                        ] as $option)
                            <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                                <input type="checkbox" name="programme_design[]" value="{{ $option }}" @checked(in_array($option, $selectedProgrammeDesign, true)) style="width:auto; margin-top:.25rem;">
                                <span>{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div style="margin-top:1rem;">
                        <label for="programme_design_additional" style="display:block; font-weight:600; margin-bottom:.35rem;">Additional suggestions on format and structure</label>
                        <textarea id="programme_design_additional" name="programme_design_additional" rows="4" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('programme_design_additional') }}</textarea>
                    </div>

                    <h3>Section 7: Intersessional Activities</h3>
                    <p style="margin-top:.1rem; margin-bottom:.75rem;">What activities should be implemented beyond the Forum (throughout the year)?</p>
                    @php($selectedIntersessionalActivities = old('intersessional_activities', []))
                    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                        @foreach([
                            'Capacity building programmes (e.g., TzSIG)',
                            'Policy dialogues',
                            'Community outreach (TzKMIGF)',
                            'Research & publications',
                            'Women-focused programmes',
                        ] as $option)
                            <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                                <input type="checkbox" name="intersessional_activities[]" value="{{ $option }}" @checked(in_array($option, $selectedIntersessionalActivities, true)) style="width:auto; margin-top:.25rem;">
                                <span>{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>

                    <h3>Consent</h3>
                    <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                        <input type="checkbox" name="consent" value="1" @checked(old('consent')) required style="width:auto; margin-top:.25rem;">
                        <span>I agree that my submission may be used for TzIGF programme development and public reporting. *</span>
                    </label>

                    <div style="margin-top:1.25rem;">
                        <button type="submit" class="btn btn-submit-input">Submit Public Input</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@include('partials.site-footer')
@endsection
