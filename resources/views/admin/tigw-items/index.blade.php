@extends('admin.layout')

@section('content')
<div class="card">
    <h1>TIGW Items</h1>
    <p><a class="btn btn-primary" href="{{ route('admin.tigw-items.create') }}">Add TIGW Item</a></p>

    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->display_order }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a class="btn btn-muted" href="{{ route('admin.tigw-items.edit', $item) }}">Edit</a>
                        <form class="inline" method="POST" action="{{ route('admin.tigw-items.destroy', $item) }}" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No TIGW items yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
