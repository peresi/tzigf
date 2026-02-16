@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Reports</h1>
    <p><a class="btn btn-primary" href="{{ route('admin.reports.create') }}">Upload New Report</a></p>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>PDF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $report)
                <tr>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->report_year ?? '-' }}</td>
                    <td><a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" rel="noopener">Open</a></td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.reports.edit', $report) }}">Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.reports.destroy', $report) }}" onsubmit="return confirm('Delete this report?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No reports uploaded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
