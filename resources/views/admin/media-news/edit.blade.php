@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Edit Media/News Item</h1>
    <form method="POST" action="{{ route('admin.media-news.update', $item) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $item->title) }}" required>

        <label for="type">Type</label>
        <select id="type" name="type" required>
            <option value="news" @selected(old('type', $item->type) === 'news')>News</option>
            <option value="media" @selected(old('type', $item->type) === 'media')>Media</option>
        </select>

        <label for="published_at">Published Date</label>
        <input id="published_at" name="published_at" type="date" value="{{ old('published_at', optional($item->published_at)->format('Y-m-d')) }}">

        <label for="body">Body</label>
        <textarea id="body" name="body">{{ old('body', $item->body) }}</textarea>

        <label for="external_url">External URL</label>
        <input id="external_url" name="external_url" type="url" value="{{ old('external_url', $item->external_url) }}">

        <label for="image">Replace Image (optional)</label>
        <input id="image" name="image" type="file" accept="image/*">

        <div class="actions">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-muted" href="{{ route('admin.media-news.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
