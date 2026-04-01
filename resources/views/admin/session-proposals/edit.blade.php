@extends('admin.layout')

@section('content')
<div class="card" style="max-width: 980px;">
    <h1>Session Proposal Details</h1>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1rem; margin-bottom:1rem;">
        <div class="card" style="margin-bottom:0;">
            <h3>Applicant Information</h3>
            <p><strong>Full Name:</strong> {{ $proposal->full_name }}</p>
            <p><strong>Organization:</strong> {{ $proposal->organization ?: '—' }}</p>
            <p><strong>Country:</strong> {{ $proposal->country }}</p>
            <p><strong>Email:</strong> {{ $proposal->email }}</p>
            <p><strong>Submitted:</strong> {{ optional($proposal->created_at)->format('d M Y H:i') ?? '—' }}</p>
        </div>

        <div class="card" style="margin-bottom:0;">
            <h3>Session Setup</h3>
            <p><strong>Title:</strong> {{ $proposal->session_title }}</p>
            <p><strong>Format:</strong> {{ $proposal->session_format }}</p>
            <p><strong>Thematic Areas:</strong> {{ implode(', ', $proposal->thematic_areas ?? []) }}</p>
            <p><strong>Stakeholder Groups:</strong> {{ implode(', ', $proposal->stakeholder_groups ?? []) }}</p>
            <p><strong>Consent:</strong> {{ $proposal->consent ? 'Yes' : 'No' }}</p>
            <p>
                <strong>Supporting Document:</strong>
                @if($proposal->supporting_document_path)
                    <a href="{{ route('admin.session-proposals.supporting-document', $proposal) }}">{{ $proposal->supporting_document_name ?: 'Download file' }}</a>
                @else
                    —
                @endif
            </p>
        </div>
    </div>

    <div class="card">
        <h3>Session Description</h3>
        <p style="white-space: pre-line;">{{ $proposal->session_description }}</p>

        <h3>Moderator</h3>
        <p><strong>Name:</strong> {{ $proposal->moderator_name }}</p>
        <p><strong>Organization:</strong> {{ $proposal->moderator_organization ?: '—' }}</p>
        <p><strong>Email:</strong> {{ $proposal->moderator_email }}</p>

        <h3>Speakers</h3>
        <p><strong>Speaker 1:</strong> {{ $proposal->speaker_one }}</p>
        <p><strong>Speaker 2:</strong> {{ $proposal->speaker_two }}</p>
        <p><strong>Speaker 3:</strong> {{ $proposal->speaker_three ?: '—' }}</p>

        <h3>Expected Outcomes</h3>
        <p style="white-space: pre-line;">{{ $proposal->expected_outcomes }}</p>
    </div>

    <div class="card">
        <h3>Update Status</h3>
        <form method="POST" action="{{ route('admin.session-proposals.update', $proposal) }}">
            @csrf
            @method('PUT')

            <label for="status">Proposal Status</label>
            <select id="status" name="status" required>
                <option value="submitted" @selected(old('status', $proposal->status) === 'submitted')>Submitted</option>
                <option value="under_review" @selected(old('status', $proposal->status) === 'under_review')>Under Review</option>
                <option value="approved" @selected(old('status', $proposal->status) === 'approved')>Approved</option>
                <option value="rejected" @selected(old('status', $proposal->status) === 'rejected')>Rejected</option>
            </select>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Update Proposal</button>
                <a class="btn btn-muted" href="{{ route('admin.session-proposals.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
