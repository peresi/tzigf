@extends('admin.layout')

@section('content')
<div class="card">
    <h1>TSIG Fellowship Applications</h1>

    <form method="GET" action="{{ route('admin.tsig-applications.index') }}" style="margin-bottom:1rem;">
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap:.65rem;">
            <div>
                <label for="q">Search</label>
                <input id="q" name="q" type="text" value="{{ $filters['q'] }}" placeholder="Name, email, occupation, org, region, district">
            </div>

            <div>
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">All statuses</option>
                    <option value="submitted" @selected($filters['status'] === 'submitted')>Submitted</option>
                    <option value="under_review" @selected($filters['status'] === 'under_review')>Under Review</option>
                    <option value="accepted" @selected($filters['status'] === 'accepted')>Accepted</option>
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
            <a class="btn btn-muted" href="{{ route('admin.tsig-applications.index') }}">Reset</a>
            <a class="btn btn-muted" href="{{ route('admin.tsig-applications.export', request()->query()) }}">Download CSV</a>
        </div>
    </form>

    <p class="muted-text" style="margin-top:0;">
        Showing {{ $applications->firstItem() ?? 0 }} to {{ $applications->lastItem() ?? 0 }} of {{ $applications->total() }} applications.
    </p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Location</th>
                <th>Stakeholder</th>
                <th>Commitment</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $application)
                <tr>
                    <td>{{ $application->full_name }}</td>
                    <td>{{ $application->gender ?? '-' }}</td>
                    <td>{{ $application->email }}</td>
                    <td>
                        {{ $application->region ?? '-' }}
                        @if($application->district)
                            / {{ $application->district }}
                        @endif
                    </td>
                    <td>{{ $application->stakeholder_group }}</td>
                    <td>
                        FT: {{ $application->available_full_training ? 'Y' : 'N' }} |
                        GW: {{ $application->willing_participate_discussions ? 'Y' : 'N' }} |
                        IGF: {{ $application->commit_tanzania_igf_2026 ? 'Y' : 'N' }}
                    </td>
                    <td>{{ str_replace('_', ' ', ucfirst($application->status)) }}</td>
                    <td>{{ optional($application->created_at)->format('d M Y H:i') ?? '-' }}</td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.tsig-applications.edit', $application) }}">View / Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.tsig-applications.destroy', $application) }}" onsubmit="return confirm('Delete this TSIG application?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No TSIG applications received yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $applications->links() }}
    </div>
</div>
@endsection
