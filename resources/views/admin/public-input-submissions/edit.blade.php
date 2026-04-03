@extends('admin.layout')

@section('content')
<div class="card" style="max-width: 980px;">
    <h1>Public Input Details</h1>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1rem; margin-bottom:1rem;">
        <div class="card" style="margin-bottom:0;">
            <h3>Submitter Information</h3>
            <p><strong>Submission Type:</strong> {{ $submission->submission_type ?: '—' }}</p>
            <p><strong>Full Name:</strong> {{ $submission->full_name }}</p>
            <p><strong>Organization:</strong> {{ $submission->organization ?: '—' }}</p>
            <p><strong>Stakeholder Group:</strong> {{ $submission->stakeholder_group ?: '—' }}</p>
            <p><strong>Country:</strong> {{ $submission->country }}</p>
            <p><strong>Email:</strong> {{ $submission->email }}</p>
            <p><strong>WhatsApp Number:</strong> {{ $submission->whatsapp_number ?: '—' }}</p>
            <p><strong>Region:</strong> {{ $submission->region ?: '—' }}</p>
            <p><strong>Submitted:</strong> {{ optional($submission->created_at)->format('d M Y H:i') ?? '—' }}</p>
        </div>

        <div class="card" style="margin-bottom:0;">
            <h3>Stakeholders</h3>
            <ul style="margin:.4rem 0 0; padding-left:1.1rem;">
                @foreach($submission->stakeholders ?? [] as $stakeholder)
                    <li>{{ $stakeholder }}</li>
                @endforeach
            </ul>
            <p><strong>Consent:</strong> {{ $submission->consent ? 'Yes' : 'No' }}</p>
        </div>
    </div>

    <div class="card">
        <h3>Thematic Areas</h3>
        <ul style="margin:.4rem 0 1rem; padding-left:1.1rem;">
            @foreach($submission->thematic_areas ?? [] as $area)
                <li>{{ $area }}</li>
            @endforeach
        </ul>

        <h3>Priority Issues</h3>
        <p style="white-space: pre-line;">{{ $submission->priority_issues ?: '—' }}</p>

        <h3>Additional Input</h3>
        <p style="white-space: pre-line;">{{ $submission->additional_input ?: '—' }}</p>

        <h3>Implementation &amp; Impact</h3>
        <p style="white-space: pre-line;">{{ $submission->implementation_impact ?: '—' }}</p>

        <h3>Programme Design Preferences</h3>
        <ul style="margin:.4rem 0 1rem; padding-left:1.1rem;">
            @foreach($submission->programme_design ?? [] as $format)
                <li>{{ $format }}</li>
            @endforeach
        </ul>

        <h3>Programme Design Additional Suggestions</h3>
        <p style="white-space: pre-line;">{{ $submission->programme_design_additional ?: '—' }}</p>

        <h3>Intersessional Activities</h3>
        <ul style="margin:.4rem 0 1rem; padding-left:1.1rem;">
            @foreach($submission->intersessional_activities ?? [] as $activity)
                <li>{{ $activity }}</li>
            @endforeach
        </ul>

        <h3>Issue Title</h3>
        <p>{{ $submission->issue_title }}</p>

        <h3>Issue Description</h3>
        <p style="white-space: pre-line;">{{ $submission->issue_description }}</p>

        <h3>Relevance to Tanzania</h3>
        <p style="white-space: pre-line;">{{ $submission->relevance_to_tanzania }}</p>

        <h3>Policy Questions</h3>
        <p style="white-space: pre-line;">{{ $submission->policy_questions }}</p>
    </div>

    <div class="card">
        <h3>Update Status</h3>
        <form method="POST" action="{{ route('admin.public-input-submissions.update', $submission) }}">
            @csrf
            @method('PUT')

            <label for="status">Submission Status</label>
            <select id="status" name="status" required>
                <option value="submitted" @selected(old('status', $submission->status) === 'submitted')>Submitted</option>
                <option value="under_review" @selected(old('status', $submission->status) === 'under_review')>Under Review</option>
                <option value="incorporated" @selected(old('status', $submission->status) === 'incorporated')>Incorporated</option>
                <option value="archived" @selected(old('status', $submission->status) === 'archived')>Archived</option>
            </select>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Update Submission</button>
                <a class="btn btn-muted" href="{{ route('admin.public-input-submissions.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
