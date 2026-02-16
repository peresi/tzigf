@extends('admin.layout')

@section('content')
<div class="card">
    <h1>Edit TIGW Item</h1>
    <form method="POST" action="{{ route('admin.tigw-items.update', $item) }}">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $item->title) }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ old('description', $item->description) }}</textarea>

        <label for="display_order">Display Order</label>
        <input id="display_order" name="display_order" type="number" min="0" value="{{ old('display_order', $item->display_order) }}">

        <div class="actions">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-muted" href="{{ route('admin.tigw-items.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
