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
    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="pill">Application Form</span>
                <h2>Fellowship Application Form</h2>
                <p>Complete all required sections to apply for the TzSIG 2026 Fellowship.</p>
            </div>

            <div class="surface" style="margin-bottom:1rem; border-color:#bfdbfe; background:#eff6ff;">
                <h3 style="margin:.1rem 0 .45rem; color:#1e3a8a;">Data Protection Notice</h3>
                <p style="margin:0; color:#1e3a8a;">
                    The organizers comply with Tanzania’s Personal Data Protection law. Personal information, data, and photos collected will be used solely for event administration, reporting, certification, and official publicity purposes.
                </p>
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

                    <h3 style="margin-top:0;">Section 1: Personal Information</h3>
                    <div class="grid-2">
                        <div>
                            <label for="full_name" style="display:block; font-weight:600; margin-bottom:.35rem;">Full Name (as it should appear on certificate) *</label>
                            <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="gender" style="display:block; font-weight:600; margin-bottom:.35rem;">Gender *</label>
                            <select id="gender" name="gender" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Select gender</option>
                                <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                                <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                                <option value="Prefer not to say" @selected(old('gender') === 'Prefer not to say')>Prefer not to say</option>
                            </select>
                        </div>

                        <div>
                            <label for="date_of_birth" style="display:block; font-weight:600; margin-bottom:.35rem;">Date of Birth *</label>
                            <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="nationality" style="display:block; font-weight:600; margin-bottom:.35rem;">Nationality *</label>
                            <input id="nationality" name="nationality" type="text" value="{{ old('nationality') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="region" style="display:block; font-weight:600; margin-bottom:.35rem;">Region of Residence *</label>
                            <input id="region" name="region" type="text" value="{{ old('region') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="district" style="display:block; font-weight:600; margin-bottom:.35rem;">District *</label>
                            <input id="district" name="district" type="text" value="{{ old('district') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="phone" style="display:block; font-weight:600; margin-bottom:.35rem;">Phone Number *</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="email" style="display:block; font-weight:600; margin-bottom:.35rem;">Email Address *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                    </div>

                    <h3 style="margin-top:1.2rem;">Section 2: Professional Background</h3>
                    <div class="grid-2">
                        <div>
                            <label for="current_occupation" style="display:block; font-weight:600; margin-bottom:.35rem;">Current Occupation *</label>
                            <input id="current_occupation" name="current_occupation" type="text" value="{{ old('current_occupation') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="organization" style="display:block; font-weight:600; margin-bottom:.35rem;">Organization/Institution *</label>
                            <input id="organization" name="organization" type="text" value="{{ old('organization') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="stakeholder_group" style="display:block; font-weight:600; margin-bottom:.35rem;">Stakeholder Category (Select one) *</label>
                            <select id="stakeholder_group" name="stakeholder_group" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Select stakeholder category</option>
                                <option value="Government" @selected(old('stakeholder_group') === 'Government')>Government</option>
                                <option value="Civil Society" @selected(old('stakeholder_group') === 'Civil Society')>Civil Society</option>
                                <option value="Private Sector" @selected(old('stakeholder_group') === 'Private Sector')>Private Sector</option>
                                <option value="Technical Community" @selected(old('stakeholder_group') === 'Technical Community')>Technical Community</option>
                                <option value="Academia/Research" @selected(old('stakeholder_group') === 'Academia/Research')>Academia/Research</option>
                                <option value="Media/Journalist" @selected(old('stakeholder_group') === 'Media/Journalist')>Media/Journalist</option>
                                <option value="Student" @selected(old('stakeholder_group') === 'Student')>Student</option>
                                <option value="Youth Representative" @selected(old('stakeholder_group') === 'Youth Representative')>Youth Representative</option>
                                <option value="Community Leader" @selected(old('stakeholder_group') === 'Community Leader')>Community Leader</option>
                                <option value="Other" @selected(old('stakeholder_group') === 'Other')>Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="stakeholder_other" style="display:block; font-weight:600; margin-bottom:.35rem;">Other (Specify)</label>
                            <input id="stakeholder_other" name="stakeholder_other" type="text" value="{{ old('stakeholder_other') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="highest_education" style="display:block; font-weight:600; margin-bottom:.35rem;">Highest Level of Education Completed *</label>
                            <input id="highest_education" name="highest_education" type="text" value="{{ old('highest_education') }}" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>

                        <div>
                            <label for="field_of_study" style="display:block; font-weight:600; margin-bottom:.35rem;">Field of Study (if applicable)</label>
                            <input id="field_of_study" name="field_of_study" type="text" value="{{ old('field_of_study') }}" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">
                        </div>
                    </div>

                    <h3 style="margin-top:1.2rem;">Section 3: Internet Governance Experience</h3>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:.45rem;">Have you previously participated in:</label>
                        @php
                            $participation = old('previous_participation', []);
                        @endphp
                        <div style="display:grid; gap:.35rem;">
                            @foreach(['Tanzania IGF', 'Tanzania School of Internet Governance', 'Africa School of Internet Governance', 'Global IGF', 'None'] as $option)
                                <label style="display:flex; align-items:center; gap:.5rem;">
                                    <input type="checkbox" name="previous_participation[]" value="{{ $option }}" @checked(in_array($option, $participation, true))>
                                    <span>{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div style="margin-top:.95rem;">
                        <label for="internet_governance_experience" style="display:block; font-weight:600; margin-bottom:.35rem;">Briefly describe your experience with Internet governance (Max 250 words) *</label>
                        <textarea id="internet_governance_experience" name="internet_governance_experience" rows="5" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">{{ old('internet_governance_experience') }}</textarea>
                    </div>

                    <h3 style="margin-top:1.2rem;">Section 4: Motivation and Impact</h3>
                    <div style="margin-top:.4rem;">
                        <label for="motivation" style="display:block; font-weight:600; margin-bottom:.35rem;">Why do you want to participate in TzSIG 2026? (Max 300 words) *</label>
                        <textarea id="motivation" name="motivation" rows="5" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">{{ old('motivation') }}</textarea>
                    </div>

                    <div style="margin-top:.95rem;">
                        <label for="institutional_benefit" style="display:block; font-weight:600; margin-bottom:.35rem;">How will this fellowship benefit your institution/community? (Max 300 words) *</label>
                        <textarea id="institutional_benefit" name="institutional_benefit" rows="5" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">{{ old('institutional_benefit') }}</textarea>
                    </div>

                    <div style="margin-top:.95rem;">
                        <label for="passionate_issue" style="display:block; font-weight:600; margin-bottom:.35rem;">Describe one Internet governance issue affecting Tanzania that you are passionate about. (Max 250 words) *</label>
                        <textarea id="passionate_issue" name="passionate_issue" rows="5" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem;">{{ old('passionate_issue') }}</textarea>
                    </div>

                    <h3 style="margin-top:1.2rem;">Section 5: Commitment</h3>
                    <div class="grid-2">
                        <div>
                            <label for="available_full_training" style="display:block; font-weight:600; margin-bottom:.35rem;">Are you available to attend the full training program (all days)? *</label>
                            <select id="available_full_training" name="available_full_training" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Select</option>
                                <option value="1" @selected(old('available_full_training') === '1')>Yes</option>
                                <option value="0" @selected(old('available_full_training') === '0')>No</option>
                            </select>
                        </div>

                        <div>
                            <label for="willing_participate_discussions" style="display:block; font-weight:600; margin-bottom:.35rem;">Are you willing to actively participate in discussions and group work? *</label>
                            <select id="willing_participate_discussions" name="willing_participate_discussions" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Select</option>
                                <option value="1" @selected(old('willing_participate_discussions') === '1')>Yes</option>
                                <option value="0" @selected(old('willing_participate_discussions') === '0')>No</option>
                            </select>
                        </div>

                        <div>
                            <label for="commit_tanzania_igf_2026" style="display:block; font-weight:600; margin-bottom:.35rem;">Do you commit to participating in Tanzania IGF 2026 following the School? *</label>
                            <select id="commit_tanzania_igf_2026" name="commit_tanzania_igf_2026" required style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Select</option>
                                <option value="1" @selected(old('commit_tanzania_igf_2026') === '1')>Yes</option>
                                <option value="0" @selected(old('commit_tanzania_igf_2026') === '0')>No</option>
                            </select>
                        </div>
                    </div>

                    <h3 style="margin-top:1.2rem;">Section 6: Inclusivity &amp; Support (Optional)</h3>
                    <div class="grid-2">
                        <div>
                            <label for="require_accessibility_support" style="display:block; font-weight:600; margin-bottom:.35rem;">Do you require any accessibility support?</label>
                            <select id="require_accessibility_support" name="require_accessibility_support" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Prefer not to answer</option>
                                <option value="1" @selected(old('require_accessibility_support') === '1')>Yes</option>
                                <option value="0" @selected(old('require_accessibility_support') === '0')>No</option>
                            </select>
                        </div>

                        <div>
                            <label for="require_travel_support" style="display:block; font-weight:600; margin-bottom:.35rem;">Do you require travel support?</label>
                            <select id="require_travel_support" name="require_travel_support" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Prefer not to answer</option>
                                <option value="1" @selected(old('require_travel_support') === '1')>Yes</option>
                                <option value="0" @selected(old('require_travel_support') === '0')>No</option>
                            </select>
                        </div>

                        <div>
                            <label for="require_accommodation_support" style="display:block; font-weight:600; margin-bottom:.35rem;">Do you require accommodation support?</label>
                            <select id="require_accommodation_support" name="require_accommodation_support" style="width:100%; border:1px solid var(--line); border-radius:10px; padding:.62rem .72rem; background:#fff;">
                                <option value="">Prefer not to answer</option>
                                <option value="1" @selected(old('require_accommodation_support') === '1')>Yes</option>
                                <option value="0" @selected(old('require_accommodation_support') === '0')>No</option>
                            </select>
                        </div>
                    </div>

                    <h3 style="margin-top:1.2rem;">Section 7: Declaration</h3>
                    <div style="margin-top:.45rem;">
                        <label style="display:flex; align-items:flex-start; gap:.55rem; margin-bottom:.6rem;">
                            <input type="checkbox" name="data_protection_accepted" value="1" @checked(old('data_protection_accepted')) required>
                            <span>I have read and understood the Data Protection Notice.</span>
                        </label>

                        <label style="display:flex; align-items:flex-start; gap:.55rem;">
                            <input type="checkbox" name="declaration_confirmed" value="1" @checked(old('declaration_confirmed')) required>
                            <span>I confirm that the information provided is accurate and complete. I understand that selection is competitive and based on merit, diversity, and stakeholder balance.</span>
                        </label>
                    </div>

                    <div style="margin-top:1rem; display:flex; gap:.65rem; flex-wrap:wrap;">
                        <button type="submit" class="btn" style="background:var(--primary); color:#fff; border-color:var(--primary);">Submit Application</button>
                        <a href="{{ route('home') }}" class="btn" style="border-color:var(--line); background:#fff; color:var(--text);">Back to Home</a>
                    </div>
                </form>
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
