@extends('admin.layout')

@section('content')
<div class="card">
    <h1>School Applicants</h1>

    <form method="GET" action="{{ route('admin.school-applicants.index') }}" style="margin-bottom:1rem;">
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap:.65rem;">
            <div>
                <label for="q">Search</label>
                <input id="q" name="q" type="text" value="{{ $filters['q'] }}" placeholder="Name, email, organization, region">
            </div>

            <div>
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">All statuses</option>
                    <option value="submitted" @selected($filters['status'] === 'submitted')>Submitted</option>
                    <option value="under_review" @selected($filters['status'] === 'under_review')>Under Review</option>
                    <option value="accepted" @selected($filters['status'] === 'accepted')>Accepted</option>
                    <option value="waitlisted" @selected($filters['status'] === 'waitlisted')>Waitlisted</option>
                    <option value="rejected" @selected($filters['status'] === 'rejected')>Rejected</option>
                </select>
            </div>

            <div>
                <label for="from_date">From Date</label>
                <input id="from_date" name="from_date" type="date" value="{{ $filters['from_date'] }}">
            </div>

            <div>
                <label for="to_date">To Date</label>
                <input id="to_date" name="to_date" type="date" value="{{ $filters['to_date'] }}">
            </div>
        </div>

        <div class="actions">
            <button class="btn btn-primary" type="submit">Apply Filters</button>
            <a class="btn btn-muted" href="{{ route('admin.school-applicants.index') }}">Reset</a>
            <a class="btn btn-muted" href="{{ route('admin.school-applicants.export', request()->query()) }}">Download CSV</a>
        </div>
    </form>

    <p class="muted-text" style="margin-top:0;">
        Showing {{ $applicants->firstItem() ?? 0 }} to {{ $applicants->lastItem() ?? 0 }} of {{ $applicants->total() }} applicants.
    </p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Stakeholder</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applicants as $applicant)
                <tr>
                    <td>{{ $applicant->full_name }}</td>
                    <td>{{ $applicant->email }}</td>
                    <td>{{ $applicant->stakeholder_group }}</td>
                    <td>{{ str_replace('_', ' ', ucfirst($applicant->status)) }}</td>
                    <td>{{ optional($applicant->created_at)->format('d M Y H:i') ?? '-' }}</td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.school-applicants.edit', $applicant) }}">View / Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.school-applicants.destroy', $applicant) }}" onsubmit="return confirm('Delete this applicant record?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No school applications submitted yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $applicants->links() }}
    </div>
</div>
@endsection
