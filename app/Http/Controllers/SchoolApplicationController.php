<?php

namespace App\Http\Controllers;

use App\Models\SchoolApplicant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolApplicationController extends Controller
{
    public function index(): View
    {
        return view('school-application');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'organization' => ['nullable', 'string', 'max:255'],
            'stakeholder_group' => ['required', 'string', 'max:100'],
            'region' => ['nullable', 'string', 'max:150'],
            'statement_of_interest' => ['required', 'string', 'min:50', 'max:3000'],
        ]);

        SchoolApplicant::create([
            ...$data,
            'status' => 'submitted',
        ]);

        return redirect()
            ->route('school.application')
            ->with('status', 'Your application has been submitted successfully. We will contact you after the review process.');
    }
}
