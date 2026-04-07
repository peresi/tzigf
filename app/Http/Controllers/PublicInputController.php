<?php

namespace App\Http\Controllers;

use App\Models\PublicInputSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PublicInputController extends Controller
{
    public function index(): View
    {
        return view('public-input');
    }

    public function store(Request $request): RedirectResponse
    {
        $thematicOptions = [
            'Universal Access & Meaningful Connectivity',
            'Digital Literacy, Capacity Building & Inclusion',
            'Cybersecurity, Trust & Online Safety',
            'Artificial Intelligence & Emerging Technologies Governance',
            'Data Protection, Privacy & Digital Rights',
            'Digital Economy, Innovation & Local Content',
        ];

        $stakeholderOptions = [
            'Government',
            'Private Sector',
            'Civil Society',
            'Technical Community',
            'Academia / Research',
        ];

        $programmeDesignOptions = [
            'Workshops',
            'Panel Discussions',
            'Roundtables (e.g., Policymakers Roundtable)',
            'Lightning Talks',
            'Community Dialogues (Kijiji/Mtaa level)',
            'Hybrid (Online + Physical)',
        ];

        $intersessionalOptions = [
            'Capacity building programmes (e.g., TzSIG)',
            'Policy dialogues',
            'Community outreach (TzKMIGF)',
            'Research & publications',
            'Women-focused programmes',
        ];

        $data = $request->validate([
            'submission_type' => ['required', 'in:Individual,Organization'],
            'full_name' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'stakeholder_group' => ['required', Rule::in($stakeholderOptions)],
            'email' => ['required', 'email', 'max:255'],
            'whatsapp_number' => ['nullable', 'string', 'max:40'],
            'region' => ['required', 'string', 'max:120'],
            'thematic_areas' => ['required', 'array', 'min:1', 'max:3'],
            'thematic_areas.*' => [Rule::in($thematicOptions)],
            'priority_issues' => ['required', 'string'],
            'additional_input' => ['nullable', 'string'],
            'implementation_impact' => ['required', 'string'],
            'programme_design' => ['required', 'array', 'min:1'],
            'programme_design.*' => [Rule::in($programmeDesignOptions)],
            'programme_design_additional' => ['nullable', 'string'],
            'intersessional_activities' => ['required', 'array', 'min:1'],
            'intersessional_activities.*' => [Rule::in($intersessionalOptions)],
            'consent' => ['accepted'],
        ]);

        $summaryTitle = implode(' | ', $data['thematic_areas']);
        $summaryDescription = $data['priority_issues'];
        $summaryRelevance = $data['additional_input'] ?: 'N/A';
        $summaryPolicyQuestions = $data['implementation_impact'];

        PublicInputSubmission::create(array_merge($data, [
            'country' => 'Tanzania',
            'issue_title' => mb_substr($summaryTitle, 0, 255),
            'issue_description' => $summaryDescription,
            'relevance_to_tanzania' => $summaryRelevance,
            'policy_questions' => $summaryPolicyQuestions,
            'stakeholders' => [$data['stakeholder_group']],
            'status' => 'submitted',
        ]));

        return redirect()
            ->route('public-input.index')
            ->with('status', 'Your public input has been submitted successfully. Thank you for helping shape TzIGF 2026.');
    }
}
