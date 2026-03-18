@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Dashboard Overview</h1>
    <p>Welcome back. Use the quick actions below to manage the TzIGF website content.</p>
</div>

<div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: .9rem;">
    <div class="card" style="margin-bottom:0;">
        <h3>Reports</h3>
        <p class="muted-text">Upload and manage annual reports and documents.</p>
        <div class="actions">
            <a class="btn btn-primary" href="{{ route('admin.reports.index') }}">Open Reports</a>
        </div>
    </div>

    <div class="card" style="margin-bottom:0;">
        <h3>Media & News</h3>
        <p class="muted-text">Publish latest updates, announcements, and media posts.</p>
        <div class="actions">
            <a class="btn btn-primary" href="{{ route('admin.media-news.index') }}">Open Media & News</a>
        </div>
    </div>

    <div class="card" style="margin-bottom:0;">
        <h3>TIGW Items</h3>
        <p class="muted-text">Maintain Tanzania Internet Governance Week content blocks.</p>
        <div class="actions">
            <a class="btn btn-primary" href="{{ route('admin.tigw-items.index') }}">Open TIGW Items</a>
        </div>
    </div>

    <div class="card" style="margin-bottom:0;">
        <h3>TzIGF Fellowship Applications</h3>
        <p class="muted-text">Manage TzIGF fellowship applications for internet governance forum attendance.</p>
        <div class="actions">
            <a class="btn btn-primary" href="{{ route('admin.school-applicants.index') }}">Open Applications</a>
        </div>
    </div>

    <div class="card" style="margin-bottom:0;">
        <h3>TzSIG Fellowship Applications</h3>
        <p class="muted-text">Manage Tanzania School of Internet Governance fellowship applications.</p>
        <div class="actions">
            <a class="btn btn-primary" href="{{ route('admin.tsig-applications.index') }}">Open Applications</a>
        </div>
    </div>
</div>
@endsection
