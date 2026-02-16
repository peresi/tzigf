<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TigwItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TigwItemController extends Controller
{
    public function index(): View
    {
        return view('admin.tigw-items.index', [
            'items' => TigwItem::query()->orderBy('display_order')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.tigw-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        TigwItem::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'display_order' => $data['display_order'] ?? 0,
        ]);

        return redirect()->route('admin.tigw-items.index')->with('status', 'TIGW item created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.tigw-items.index');
    }

    public function edit(TigwItem $tigw_item): View
    {
        return view('admin.tigw-items.edit', ['item' => $tigw_item]);
    }

    public function update(Request $request, TigwItem $tigw_item): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $tigw_item->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'display_order' => $data['display_order'] ?? 0,
        ]);

        return redirect()->route('admin.tigw-items.index')->with('status', 'TIGW item updated successfully.');
    }

    public function destroy(TigwItem $tigw_item): RedirectResponse
    {
        $tigw_item->delete();

        return redirect()->route('admin.tigw-items.index')->with('status', 'TIGW item deleted successfully.');
    }
}
