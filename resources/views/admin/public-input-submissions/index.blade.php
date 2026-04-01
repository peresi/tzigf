@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Public Input Submissions</h1>

    <form method="GET" action="{{ route('admin.public-input-submissions.index') }}" style="margin-bottom:1rem;">
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap:.65rem;">
            <div>
                <label for="q">Search</label>
                <input id="q" name="q" type="text" value="{{ $filters['q'] }}" placeholder="Name, email, organization, issue title">
            </div>
            <div>
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">All statuses</option>
                    <option value="submitted" @selected($filters['status'] === 'submitted')>Submitted</option>
                    <option value="under_review" @selected($filters['status'] === 'under_review')>Under Review</option>
                    <option value="incorporated" @selected($filters['status'] === 'incorporated')>Incorporated</option>
                    <option value="archived" @selected($filters['status'] === 'archived')>Archived</option>
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
            <a class="btn btn-muted" href="{{ route('admin.public-input-submissions.index') }}">Reset</a>
            <a class="btn btn-muted" href="{{ route('admin.public-input-submissions.export', request()->query()) }}">Download CSV</a>
        </div>
    </form>

    <p class="muted-text" style="margin-top:0;">
        Showing {{ $submissions->firstItem() ?? 0 }} to {{ $submissions->lastItem() ?? 0 }} of {{ $submissions->total() }} submissions.
    </p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Issue Title</th>
                <th>Stakeholders</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($submissions as $submission)
                <tr>
                    <td>{{ $submission->full_name }}</td>
                    <td>{{ $submission->email }}</td>
                    <td>{{ $submission->country }}</td>
                    <td>{{ $submission->issue_title }}</td>
                    <td>{{ implode(', ', array_slice($submission->stakeholders ?? [], 0, 2)) }}{{ count($submission->stakeholders ?? []) > 2 ? '...' : '' }}</td>
                    <td>{{ str_replace('_', ' ', ucfirst($submission->status)) }}</td>
                    <td>{{ optional($submission->created_at)->format('d M Y H:i') ?? '-' }}</td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.public-input-submissions.edit', $submission) }}">View / Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.public-input-submissions.destroy', $submission) }}" onsubmit="return confirm('Delete this public input submission?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No public input submissions yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $submissions->links() }}
    </div>
</div>
@endsection
