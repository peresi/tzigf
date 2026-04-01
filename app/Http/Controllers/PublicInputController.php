<?php

namespace App\Http\Controllers;

use App\Models\PublicInputSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicInputController extends Controller
{
    public function index(): View
    {
        return view('public-input');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'issue_title' => ['required', 'string', 'max:255'],
            'issue_description' => ['required', 'string', function (string $attribute, mixed $value, \Closure $fail): void {
                $words = str_word_count((string) $value);
                if ($words < 200 || $words > 300) {
                    $fail('The issue description must be between 200 and 300 words.');
                }
            }],
            'relevance_to_tanzania' => ['required', 'string'],
            'policy_questions' => ['required', 'string'],
            'stakeholders' => ['required', 'array', 'min:1'],
            'stakeholders.*' => ['in:Government / Policymakers,Private Sector,Civil Society,Technical Community,Academia / Research Institutions,Local Communities,Youth,Women,Journalists / Media'],
            'consent' => ['accepted'],
        ]);

        PublicInputSubmission::create([
            ...$data,
            'status' => 'submitted',
        ]);

        return redirect()
            ->route('public-input.index')
            ->with('status', 'Your public input has been submitted successfully. Thank you for helping shape TzIGF 2026.');
    }
}
