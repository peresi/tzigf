<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaNews;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaNewsController extends Controller
{
    public function index(): View
    {
        return view('admin.media-news.index', [
            'items' => MediaNews::query()->latest('published_at')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.media-news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:news,media'],
            'published_at' => ['nullable', 'date'],
            'body' => ['nullable', 'string'],
            'external_url' => ['nullable', 'url'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('media-news', 'public')
            : null;

        MediaNews::create([
            'title' => $data['title'],
            'type' => $data['type'],
            'published_at' => $data['published_at'] ?? null,
            'body' => $data['body'] ?? null,
            'external_url' => $data['external_url'] ?? null,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.media-news.index')->with('status', 'Media/News item created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.media-news.index');
    }

    public function edit(MediaNews $media_news): View
    {
        return view('admin.media-news.edit', ['item' => $media_news]);
    }

    public function update(Request $request, MediaNews $media_news): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:news,media'],
            'published_at' => ['nullable', 'date'],
            'body' => ['nullable', 'string'],
            'external_url' => ['nullable', 'url'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            if ($media_news->image_path) {
                Storage::disk('public')->delete($media_news->image_path);
            }

            $media_news->image_path = $request->file('image')->store('media-news', 'public');
        }

        $media_news->title = $data['title'];
        $media_news->type = $data['type'];
        $media_news->published_at = $data['published_at'] ?? null;
        $media_news->body = $data['body'] ?? null;
        $media_news->external_url = $data['external_url'] ?? null;
        $media_news->save();

        return redirect()->route('admin.media-news.index')->with('status', 'Media/News item updated successfully.');
    }

    public function destroy(MediaNews $media_news): RedirectResponse
    {
        if ($media_news->image_path) {
            Storage::disk('public')->delete($media_news->image_path);
        }

        $media_news->delete();

        return redirect()->route('admin.media-news.index')->with('status', 'Media/News item deleted successfully.');
    }
}
