@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Media & News</h1>
    <p><a class="btn btn-primary" href="{{ route('admin.media-news.create') }}">Create New Item</a></p>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ strtoupper($item->type) }}</td>
                    <td>{{ optional($item->published_at)->format('d M Y') ?? '-' }}</td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.media-news.edit', $item) }}">Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.media-news.destroy', $item) }}" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No media/news items yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
