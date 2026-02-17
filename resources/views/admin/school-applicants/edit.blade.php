@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Edit Applicant</h1>

    <form method="POST" action="{{ route('admin.school-applicants.update', $applicant) }}">
        @csrf
        @method('PUT')

        <label for="full_name">Full Name</label>
        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $applicant->full_name) }}" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $applicant->email) }}" required>

        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text" value="{{ old('phone', $applicant->phone) }}">

        <label for="organization">Organization / Institution</label>
        <input id="organization" name="organization" type="text" value="{{ old('organization', $applicant->organization) }}">

        <label for="stakeholder_group">Stakeholder Group</label>
        <select id="stakeholder_group" name="stakeholder_group" required>
            @php
                $groups = ['Youth', 'Women', 'Academia', 'Civil Society', 'Private Sector', 'Technical Community', 'Government', 'Other'];
            @endphp
            @foreach($groups as $group)
                <option value="{{ $group }}" @selected(old('stakeholder_group', $applicant->stakeholder_group) === $group)>{{ $group }}</option>
            @endforeach
        </select>

        <label for="region">Region</label>
        <input id="region" name="region" type="text" value="{{ old('region', $applicant->region) }}">

        <label for="status">Application Status</label>
        <select id="status" name="status" required>
            <option value="submitted" @selected(old('status', $applicant->status) === 'submitted')>Submitted</option>
            <option value="under_review" @selected(old('status', $applicant->status) === 'under_review')>Under Review</option>
            <option value="accepted" @selected(old('status', $applicant->status) === 'accepted')>Accepted</option>
            <option value="waitlisted" @selected(old('status', $applicant->status) === 'waitlisted')>Waitlisted</option>
            <option value="rejected" @selected(old('status', $applicant->status) === 'rejected')>Rejected</option>
        </select>

        <label for="statement_of_interest">Statement of Interest</label>
        <textarea id="statement_of_interest" name="statement_of_interest" required>{{ old('statement_of_interest', $applicant->statement_of_interest) }}</textarea>

        <p class="muted-text">Submitted on {{ optional($applicant->created_at)->format('d M Y H:i') ?? '-' }}</p>

        <div class="actions">
            <button class="btn btn-primary" type="submit">Update Applicant</button>
            <a class="btn btn-muted" href="{{ route('admin.school-applicants.index') }}">Back</a>
        </div>
    </form>
</div>
@endsection
