@extends('admin.layout')

@section('content')
<div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; align-items: center;">
    <h1>TSIG Fellowship Applications</h1>
    <a href="{{ route('admin.tsig-applications.export') }}" class="btn btn-primary">Export CSV</a>
</div>

@if(session('success'))
    <div class="card" style="background: #f0fdf4; border-color: #86efac; margin-bottom: 1rem;">
        <p style="color: #166534; margin: 0;"><strong>✓ Success:</strong> {{ session('success') }}</p>
    </div>
@endif

@if($tsig_applications->isEmpty())
    <div class="card">
        <p style="text-align: center; color: #888; margin: 2rem 0;">No TSIG applications received yet.</p>
    </div>
@else
    <div class="card">
        <div style="overflow-x: auto;">
            <table style="width: 100%;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--line);">
                        <th style="text-align: left; padding: .75rem;">Full Name</th>
                        <th style="text-align: left; padding: .75rem;">Email</th>
                        <th style="text-align: left; padding: .75rem;">Organization</th>
                        <th style="text-align: left; padding: .75rem;">Stakeholder</th>
                        <th style="text-align: left; padding: .75rem;">Status</th>
                        <th style="text-align: center; padding: .75rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tsig_applications as $application)
                        <tr style="border-bottom: 1px solid var(--line);">
                            <td style="padding: .75rem;">{{ $application->full_name }}</td>
                            <td style="padding: .75rem;">{{ $application->email }}</td>
                            <td style="padding: .75rem;">{{ $application->organization ?? '—' }}</td>
                            <td style="padding: .75rem; font-size: .9rem;">{{ $application->stakeholder_group }}</td>
                            <td style="padding: .75rem;">
                                @php
                                    $statusColors = [
                                        'submitted' => ['#fef3c7', '#92400e'],
                                        'under_review' => ['#e0e7ff', '#3730a3'],
                                        'accepted' => ['#dcfce7', '#166534'],
                                        'rejected' => ['#fee2e2', '#991b1b'],
                                    ];
                                    [$bgColor, $textColor] = $statusColors[$application->status] ?? ['#f3f4f6', '#374151'];
                                @endphp
                                <span style="background: {{ $bgColor }}; color: {{ $textColor }}; padding: .25rem .5rem; border-radius: 6px; font-size: .85rem; font-weight: 600; text-transform: capitalize;">
                                    {{ str_replace('_', ' ', $application->status) }}
                                </span>
                            </td>
                            <td style="padding: .75rem; text-align: center;">
                                <div style="display: flex; gap: .5rem; justify-content: center;">
                                    <a href="{{ route('admin.tsig-applications.edit', $application) }}" class="btn" style="padding: .35rem .6rem; font-size: .85rem;">Edit</a>
                                    <form method="POST" action="{{ route('admin.tsig-applications.destroy', $application) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="padding: .35rem .6rem; font-size: .85rem; background: #fee2e2; color: #991b1b; border-color: #fecaca;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($tsig_applications->hasPages())
        <div style="margin-top: 1.5rem; display: flex; justify-content: center; gap: 1rem;">
            {{ $tsig_applications->links() }}
        </div>
    @endif
@endif
@endsection
