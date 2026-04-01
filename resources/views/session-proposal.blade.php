@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">TzIGF 2026 Participation</p>
                <h1>Call for Session Proposals</h1>
                <p>
                    Propose a session for TzIGF 2026 and help shape a timely, inclusive, and multistakeholder programme.
                    Provide your proposed topic, format, speakers, and expected outcomes.
                </p>
            </div>
            <aside class="hero-highlight">
                <h3>Proposal Checklist</h3>
                <p>Choose one or more thematic areas.</p>
                <p>Include moderator and speaker details.</p>
                <p>Attach an optional supporting document if helpful.</p>
            </aside>
        </div>
    </div>
</header>

<main>
    <section class="section" id="application-form">
        <div class="container">
            <div class="section-head">
                <span class="pill">Online Form</span>
                <h2>Session Proposal Submission Form</h2>
                <p>Submit your session proposal for the Tanzania Internet Governance Forum 2026.</p>
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
                <form method="POST" action="{{ route('session-proposal.submit') }}" enctype="multipart/form-data">
                    @csrf

                    <h3 style="margin-top:0;">Section 1: Applicant Information</h3>
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

                    <h3>Section 2: Session Information</h3>
                    <div>
                        <label for="session_title" style="display:block; font-weight:600; margin-bottom:.35rem;">Session Title *</label>
                        <input id="session_title" name="session_title" type="text" value="{{ old('session_title') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                    </div>

                    @php
                        $thematicAreas = ['Connectivity & Inclusion', 'AI & Emerging Technologies', 'Cybersecurity & Trust', 'Data Governance & Rights', 'Digital Economy', 'Environment & Technology'];
                        $selectedAreas = old('thematic_areas', []);
                    @endphp
                    <div style="margin-top:1rem;">
                        <label style="display:block; font-weight:600; margin-bottom:.35rem;">Thematic Area(s) *</label>
                        <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                            @foreach($thematicAreas as $area)
                                <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                                    <input type="checkbox" name="thematic_areas[]" value="{{ $area }}" @checked(in_array($area, $selectedAreas, true)) style="width:auto; margin-top:.25rem;">
                                    <span>{{ $area }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div style="margin-top:1rem;">
                        <label for="session_format" style="display:block; font-weight:600; margin-bottom:.35rem;">Session Format *</label>
                        <select id="session_format" name="session_format" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                            <option value="">Select session format</option>
                            <option value="Roundtable" @selected(old('session_format') === 'Roundtable')>Roundtable</option>
                            <option value="Open Forum" @selected(old('session_format') === 'Open Forum')>Open Forum</option>
                            <option value="Lightning Presentation" @selected(old('session_format') === 'Lightning Presentation')>Lightning Presentation</option>
                        </select>
                    </div>

                    <div style="margin-top:1rem;">
                        <label for="session_description" style="display:block; font-weight:600; margin-bottom:.35rem;">Session Description (200-300 words) *</label>
                        <textarea id="session_description" name="session_description" rows="7" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('session_description') }}</textarea>
                    </div>

                    <h3>Section 3: Speakers and Moderation</h3>
                    <div class="grid-2">
                        <div>
                            <label for="moderator_name" style="display:block; font-weight:600; margin-bottom:.35rem;">Moderator Name *</label>
                            <input id="moderator_name" name="moderator_name" type="text" value="{{ old('moderator_name') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="moderator_organization" style="display:block; font-weight:600; margin-bottom:.35rem;">Moderator Organization</label>
                            <input id="moderator_organization" name="moderator_organization" type="text" value="{{ old('moderator_organization') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="moderator_email" style="display:block; font-weight:600; margin-bottom:.35rem;">Moderator Email *</label>
                            <input id="moderator_email" name="moderator_email" type="email" value="{{ old('moderator_email') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="speaker_one" style="display:block; font-weight:600; margin-bottom:.35rem;">Speaker 1 *</label>
                            <input id="speaker_one" name="speaker_one" type="text" value="{{ old('speaker_one') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="speaker_two" style="display:block; font-weight:600; margin-bottom:.35rem;">Speaker 2 *</label>
                            <input id="speaker_two" name="speaker_two" type="text" value="{{ old('speaker_two') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                        <div>
                            <label for="speaker_three" style="display:block; font-weight:600; margin-bottom:.35rem;">Speaker 3 (Optional)</label>
                            <input id="speaker_three" name="speaker_three" type="text" value="{{ old('speaker_three') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                    </div>

                    <h3>Section 4: Multistakeholder Representation</h3>
                    @php
                        $stakeholderGroups = ['Government', 'Private Sector', 'Civil Society', 'Technical Community', 'Academia / Research', 'Media', 'Communities / Citizens'];
                        $selectedGroups = old('stakeholder_groups', []);
                    @endphp
                    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                        @foreach($stakeholderGroups as $group)
                            <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                                <input type="checkbox" name="stakeholder_groups[]" value="{{ $group }}" @checked(in_array($group, $selectedGroups, true)) style="width:auto; margin-top:.25rem;">
                                <span>{{ $group }}</span>
                            </label>
                        @endforeach
                    </div>

                    <h3>Section 5: Expected Outcomes</h3>
                    <div>
                        <label for="expected_outcomes" style="display:block; font-weight:600; margin-bottom:.35rem;">Expected Outcomes of the Session *</label>
                        <textarea id="expected_outcomes" name="expected_outcomes" rows="5" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.72rem;">{{ old('expected_outcomes') }}</textarea>
                    </div>

                    <h3>Section 6: Additional Information</h3>
                    <div>
                        <label for="supporting_document" style="display:block; font-weight:600; margin-bottom:.35rem;">Supporting Document (Optional)</label>
                        <input id="supporting_document" name="supporting_document" type="file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        <p style="margin:.4rem 0 0; color:var(--muted);">Accepted formats: PDF, DOC, DOCX. Max file size: 10 MB.</p>
                    </div>

                    <h3>Section 7: Consent</h3>
                    <label style="display:flex; align-items:flex-start; gap:.5rem; font-weight:500;">
                        <input type="checkbox" name="consent" value="1" @checked(old('consent')) required style="width:auto; margin-top:.25rem;">
                        <span>I confirm that all speakers have agreed to participate and that the information provided may be used for TzIGF programme development. *</span>
                    </label>

                    <div style="margin-top:1.25rem;">
                        <button type="submit" class="btn btn-primary">Submit Session Proposal</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@include('partials.site-footer')
@endsection
