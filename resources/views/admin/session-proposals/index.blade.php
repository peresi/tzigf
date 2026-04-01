@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Session Proposals</h1>

    <form method="GET" action="{{ route('admin.session-proposals.index') }}" style="margin-bottom:1rem;">
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap:.65rem;">
            <div>
                <label for="q">Search</label>
                <input id="q" name="q" type="text" value="{{ $filters['q'] }}" placeholder="Title, name, email, moderator">
            </div>
            <div>
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">All statuses</option>
                    <option value="submitted" @selected($filters['status'] === 'submitted')>Submitted</option>
                    <option value="under_review" @selected($filters['status'] === 'under_review')>Under Review</option>
                    <option value="approved" @selected($filters['status'] === 'approved')>Approved</option>
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
            <a class="btn btn-muted" href="{{ route('admin.session-proposals.index') }}">Reset</a>
            <a class="btn btn-muted" href="{{ route('admin.session-proposals.export', request()->query()) }}">Download CSV</a>
        </div>
    </form>

    <p class="muted-text" style="margin-top:0;">
        Showing {{ $proposals->firstItem() ?? 0 }} to {{ $proposals->lastItem() ?? 0 }} of {{ $proposals->total() }} proposals.
    </p>

    <table>
        <thead>
            <tr>
                <th>Session Title</th>
                <th>Submitter</th>
                <th>Moderator</th>
                <th>Format</th>
                <th>Status</th>
                <th>Document</th>
                <th>Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->session_title }}</td>
                    <td>
                        {{ $proposal->full_name }}<br>
                        <span class="muted-text">{{ $proposal->email }}</span>
                    </td>
                    <td>{{ $proposal->moderator_name }}</td>
                    <td>{{ $proposal->session_format }}</td>
                    <td>{{ str_replace('_', ' ', ucfirst($proposal->status)) }}</td>
                    <td>
                        @if($proposal->supporting_document_path)
                            <a class="btn btn-muted" href="{{ route('admin.session-proposals.supporting-document', $proposal) }}">Download</a>
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ optional($proposal->created_at)->format('d M Y H:i') ?? '-' }}</td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.session-proposals.edit', $proposal) }}">View / Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.session-proposals.destroy', $proposal) }}" onsubmit="return confirm('Delete this session proposal?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No session proposals yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $proposals->links() }}
    </div>
</div>
@endsection
