@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Edit Applicant</h1>

    <form method="POST" action="{{ route('admin.school-applicants.update', $applicant) }}">
        @csrf
        @method('PUT')

        <h2 style="margin:0 0 .6rem; font-size:1.05rem;">Section 1: Personal Information</h2>

        <label for="full_name">Full Name (Certificate)</label>
        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $applicant->full_name) }}" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="Male" @selected(old('gender', $applicant->gender) === 'Male')>Male</option>
            <option value="Female" @selected(old('gender', $applicant->gender) === 'Female')>Female</option>
            <option value="Prefer not to say" @selected(old('gender', $applicant->gender) === 'Prefer not to say')>Prefer not to say</option>
        </select>

        <label for="date_of_birth">Date of Birth</label>
        <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth', optional($applicant->date_of_birth)->format('Y-m-d')) }}" required>

        <label for="nationality">Nationality</label>
        <input id="nationality" name="nationality" type="text" value="{{ old('nationality', $applicant->nationality) }}" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $applicant->email) }}" required>

        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text" value="{{ old('phone', $applicant->phone) }}" required>

        <label for="region">Region of Residence</label>
        <input id="region" name="region" type="text" value="{{ old('region', $applicant->region) }}" required>

        <label for="district">District</label>
        <input id="district" name="district" type="text" value="{{ old('district', $applicant->district) }}" required>

        <h2 style="margin:1rem 0 .6rem; font-size:1.05rem;">Section 2: Professional Background</h2>

        <label for="current_occupation">Current Occupation</label>
        <input id="current_occupation" name="current_occupation" type="text" value="{{ old('current_occupation', $applicant->current_occupation) }}" required>

        <label for="organization">Organization / Institution</label>
        <input id="organization" name="organization" type="text" value="{{ old('organization', $applicant->organization) }}" required>

        <label for="stakeholder_group">Stakeholder Category</label>
        <select id="stakeholder_group" name="stakeholder_group" required>
            @php
                $groups = ['Government', 'Civil Society', 'Private Sector', 'Technical Community', 'Academia/Research', 'Media/Journalist', 'Student', 'Youth Representative', 'Community Leader', 'Other'];
            @endphp
            @foreach($groups as $group)
                <option value="{{ $group }}" @selected(old('stakeholder_group', $applicant->stakeholder_group) === $group)>{{ $group }}</option>
            @endforeach
        </select>

        <label for="stakeholder_other">Other (Specify)</label>
        <input id="stakeholder_other" name="stakeholder_other" type="text" value="{{ old('stakeholder_other', $applicant->stakeholder_other) }}">

        <label for="highest_education">Highest Level of Education</label>
        <input id="highest_education" name="highest_education" type="text" value="{{ old('highest_education', $applicant->highest_education) }}" required>

        <label for="field_of_study">Field of Study</label>
        <input id="field_of_study" name="field_of_study" type="text" value="{{ old('field_of_study', $applicant->field_of_study) }}">

        <h2 style="margin:1rem 0 .6rem; font-size:1.05rem;">Section 3: Internet Governance Experience</h2>
        @php
            $participation = old('previous_participation', $applicant->previous_participation ?? []);
        @endphp
        @foreach(['Tanzania IGF', 'Tanzania School of Internet Governance', 'Africa School of Internet Governance', 'Global IGF', 'None'] as $item)
            <label style="display:flex; align-items:center; gap:.5rem; margin:.2rem 0;">
                <input type="checkbox" name="previous_participation[]" value="{{ $item }}" @checked(in_array($item, $participation, true))>
                <span>{{ $item }}</span>
            </label>
        @endforeach

        <label for="internet_governance_experience">Internet Governance Experience (max 250)</label>
        <textarea id="internet_governance_experience" name="internet_governance_experience" required>{{ old('internet_governance_experience', $applicant->internet_governance_experience) }}</textarea>

        <h2 style="margin:1rem 0 .6rem; font-size:1.05rem;">Section 4: Motivation and Impact</h2>
        <label for="motivation">Motivation (max 300)</label>
        <textarea id="motivation" name="motivation" required>{{ old('motivation', $applicant->motivation) }}</textarea>

        <label for="institutional_benefit">Institution/Community Benefit (max 300)</label>
        <textarea id="institutional_benefit" name="institutional_benefit" required>{{ old('institutional_benefit', $applicant->institutional_benefit) }}</textarea>

        <label for="passionate_issue">Passionate Issue (max 250)</label>
        <textarea id="passionate_issue" name="passionate_issue" required>{{ old('passionate_issue', $applicant->passionate_issue) }}</textarea>

        <h2 style="margin:1rem 0 .6rem; font-size:1.05rem;">Section 5: Commitment</h2>
        <label for="available_full_training">Available Full Training</label>
        <select id="available_full_training" name="available_full_training" required>
            <option value="1" @selected((string) old('available_full_training', (int) $applicant->available_full_training) === '1')>Yes</option>
            <option value="0" @selected((string) old('available_full_training', (int) $applicant->available_full_training) === '0')>No</option>
        </select>

        <label for="willing_participate_discussions">Willing to Participate in Discussions</label>
        <select id="willing_participate_discussions" name="willing_participate_discussions" required>
            <option value="1" @selected((string) old('willing_participate_discussions', (int) $applicant->willing_participate_discussions) === '1')>Yes</option>
            <option value="0" @selected((string) old('willing_participate_discussions', (int) $applicant->willing_participate_discussions) === '0')>No</option>
        </select>

        <label for="commit_tanzania_igf_2026">Commit to Tanzania IGF 2026</label>
        <select id="commit_tanzania_igf_2026" name="commit_tanzania_igf_2026" required>
            <option value="1" @selected((string) old('commit_tanzania_igf_2026', (int) $applicant->commit_tanzania_igf_2026) === '1')>Yes</option>
            <option value="0" @selected((string) old('commit_tanzania_igf_2026', (int) $applicant->commit_tanzania_igf_2026) === '0')>No</option>
        </select>

        <h2 style="margin:1rem 0 .6rem; font-size:1.05rem;">Section 6: Inclusivity &amp; Support</h2>
        <label for="require_accessibility_support">Require Accessibility Support</label>
        <select id="require_accessibility_support" name="require_accessibility_support">
            <option value="">Prefer not to answer</option>
            <option value="1" @selected((string) old('require_accessibility_support', $applicant->require_accessibility_support) === '1')>Yes</option>
            <option value="0" @selected((string) old('require_accessibility_support', $applicant->require_accessibility_support) === '0')>No</option>
        </select>

        <label for="require_travel_support">Require Travel Support</label>
        <select id="require_travel_support" name="require_travel_support">
            <option value="">Prefer not to answer</option>
            <option value="1" @selected((string) old('require_travel_support', $applicant->require_travel_support) === '1')>Yes</option>
            <option value="0" @selected((string) old('require_travel_support', $applicant->require_travel_support) === '0')>No</option>
        </select>

        <label for="require_accommodation_support">Require Accommodation Support</label>
        <select id="require_accommodation_support" name="require_accommodation_support">
            <option value="">Prefer not to answer</option>
            <option value="1" @selected((string) old('require_accommodation_support', $applicant->require_accommodation_support) === '1')>Yes</option>
            <option value="0" @selected((string) old('require_accommodation_support', $applicant->require_accommodation_support) === '0')>No</option>
        </select>

        <h2 style="margin:1rem 0 .6rem; font-size:1.05rem;">Section 7: Declaration</h2>
        <label for="data_protection_accepted">Data Protection Accepted</label>
        <select id="data_protection_accepted" name="data_protection_accepted">
            <option value="">Not set</option>
            <option value="1" @selected((string) old('data_protection_accepted', $applicant->data_protection_accepted) === '1')>Yes</option>
            <option value="0" @selected((string) old('data_protection_accepted', $applicant->data_protection_accepted) === '0')>No</option>
        </select>

        <label for="declaration_confirmed">Declaration Confirmed</label>
        <select id="declaration_confirmed" name="declaration_confirmed" required>
            <option value="1" @selected((string) old('declaration_confirmed', (int) $applicant->declaration_confirmed) === '1')>Yes</option>
            <option value="0" @selected((string) old('declaration_confirmed', (int) $applicant->declaration_confirmed) === '0')>No</option>
        </select>

        <label for="signature">Signature</label>
        <input id="signature" name="signature" type="text" value="{{ old('signature', $applicant->signature) }}" required>

        <label for="declaration_date">Declaration Date</label>
        <input id="declaration_date" name="declaration_date" type="date" value="{{ old('declaration_date', optional($applicant->declaration_date)->format('Y-m-d')) }}" required>

        <input type="hidden" name="statement_of_interest" value="{{ old('statement_of_interest', $applicant->statement_of_interest ?: $applicant->motivation) }}">

        <label for="status">Application Status</label>
        <select id="status" name="status" required>
            <option value="submitted" @selected(old('status', $applicant->status) === 'submitted')>Submitted</option>
            <option value="under_review" @selected(old('status', $applicant->status) === 'under_review')>Under Review</option>
            <option value="accepted" @selected(old('status', $applicant->status) === 'accepted')>Accepted</option>
            <option value="waitlisted" @selected(old('status', $applicant->status) === 'waitlisted')>Waitlisted</option>
            <option value="rejected" @selected(old('status', $applicant->status) === 'rejected')>Rejected</option>
        </select>

        <p class="muted-text">Submitted on {{ optional($applicant->created_at)->format('d M Y H:i') ?? '-' }}</p>

        <div class="actions">
            <button class="btn btn-primary" type="submit">Update Applicant</button>
            <a class="btn btn-muted" href="{{ route('admin.school-applicants.index') }}">Back</a>
        </div>
    </form>
</div>
@endsection
