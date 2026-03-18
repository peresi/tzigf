<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('admin.reports.index', [
            'reports' => Report::query()->latest('report_year')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.reports.create');
    }

    public function store(Request $request): RedirectResponse
    {
        if (! $request->hasFile('file')) {
            return back()->withInput()->withErrors([
                'file' => 'No file was received by the server. This usually means the file is larger than the server upload limit.',
            ]);
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'report_year' => ['nullable', 'integer', 'between:2000,2100'],
            'description' => ['nullable', 'string'],
            'file' => ['required', File::types(['pdf', 'doc', 'docx'])->max(20480)], // Increased to 20MB
        ]);

        try {
            $filePath = $request->file('file')->store('reports', 'public');

            Report::create([
                'title' => $data['title'],
                'report_year' => $data['report_year'] ?? null,
                'description' => $data['description'] ?? null,
                'file_path' => $filePath,
            ]);
        } catch (QueryException $exception) {
            return back()->withInput()->withErrors([
                'file' => 'The report could not be saved. Please verify the data and try again.',
            ]);
        }

        return redirect()->route('admin.reports.index')->with('status', 'Report uploaded successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.reports.index');
    }

    public function edit(Report $report): View
    {
        return view('admin.reports.edit', ['report' => $report]);
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'report_year' => ['nullable', 'integer', 'between:2000,2100'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', File::types(['pdf', 'doc', 'docx'])->max(10240)],
        ]);

        if ($request->hasFile('file')) {
            if ($report->file_path) {
                Storage::disk('public')->delete($report->file_path);
            }

            $report->file_path = $request->file('file')->store('reports', 'public');
        }

        $report->title = $data['title'];
        $report->report_year = $data['report_year'] ?? null;
        $report->description = $data['description'] ?? null;
        $report->save();

        return redirect()->route('admin.reports.index')->with('status', 'Report updated successfully.');
    }

    public function destroy(Report $report): RedirectResponse
    {
        if ($report->file_path) {
            Storage::disk('public')->delete($report->file_path);
        }

        $report->delete();

        return redirect()->route('admin.reports.index')->with('status', 'Report deleted successfully.');
    }
}
