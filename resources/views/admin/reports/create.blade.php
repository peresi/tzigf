@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Upload Report</h1>
    <form method="POST" action="{{ route('admin.reports.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title') }}" required>

        <label for="report_year">Year</label>
        <input id="report_year" name="report_year" type="number" min="2000" max="2100" value="{{ old('report_year') }}">

        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>

        <label for="file">Document File</label>
        <input id="file" name="file" type="file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
        <p style="margin:.35rem 0 0; color:#6b7280; font-size:.92rem;">Upload a PDF, DOC, or DOCX file up to 10MB.</p>

        <div class="actions">
            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-muted" href="{{ route('admin.reports.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
