<?php

namespace App\Http\Controllers;

use App\Models\SessionProposal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SessionProposalController extends Controller
{
    public function index(): View
    {
        return view('session-proposal');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'session_title' => ['required', 'string', 'max:255'],
            'thematic_areas' => ['required', 'array', 'min:1'],
            'thematic_areas.*' => ['in:Connectivity & Inclusion,AI & Emerging Technologies,Cybersecurity & Trust,Data Governance & Rights,Digital Economy,Environment & Technology'],
            'session_format' => ['required', 'in:Roundtable,Open Forum,Lightning Presentation'],
            'session_description' => ['required', 'string', function (string $attribute, mixed $value, \Closure $fail): void {
                $words = str_word_count((string) $value);
                if ($words < 200 || $words > 300) {
                    $fail('The session description must be between 200 and 300 words.');
                }
            }],
            'moderator_name' => ['required', 'string', 'max:255'],
            'moderator_organization' => ['nullable', 'string', 'max:255'],
            'moderator_email' => ['required', 'email', 'max:255'],
            'speaker_one' => ['required', 'string', 'max:255'],
            'speaker_two' => ['required', 'string', 'max:255'],
            'speaker_three' => ['nullable', 'string', 'max:255'],
            'stakeholder_groups' => ['required', 'array', 'min:1'],
            'stakeholder_groups.*' => ['in:Government,Private Sector,Civil Society,Technical Community,Academia / Research,Media,Communities / Citizens'],
            'expected_outcomes' => ['required', 'string'],
            'supporting_document' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'consent' => ['accepted'],
        ]);

        $documentPath = null;
        $documentName = null;

        if ($request->hasFile('supporting_document')) {
            $documentPath = $request->file('supporting_document')->store('session-proposal-documents');
            $documentName = $request->file('supporting_document')->getClientOriginalName();
        }

        unset($data['supporting_document']);

        SessionProposal::create(array_merge($data, [
            'supporting_document_path' => $documentPath,
            'supporting_document_name' => $documentName,
            'status' => 'submitted',
        ]));

        return redirect()
            ->route('session-proposal.index')
            ->with('status', 'Your session proposal has been submitted successfully. We will review it and follow up through email.');
    }
}
