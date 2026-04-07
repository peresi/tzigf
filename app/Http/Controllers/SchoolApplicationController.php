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
            'gender' => ['required', 'in:Male,Female,Prefer not to say'],
            'date_of_birth' => ['required', 'date'],
            'nationality' => ['required', 'string', 'max:120'],
            'region' => ['required', 'string', 'max:150'],
            'district' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:255'],
            'current_occupation' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'stakeholder_group' => ['required', 'string', 'max:100'],
            'stakeholder_other' => ['nullable', 'required_if:stakeholder_group,Other', 'string', 'max:255'],
            'highest_education' => ['required', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'previous_participation' => ['nullable', 'array'],
            'previous_participation.*' => ['in:Tanzania IGF,Tanzania School of Internet Governance,Africa School of Internet Governance,Global IGF,None'],
            'internet_governance_experience' => ['required', 'string', function (string $attribute, mixed $value, \Closure $fail): void {
                if (str_word_count((string) $value) > 250) {
                    $fail('The internet governance experience must not exceed 250 words.');
                }
            }],
            'motivation' => ['required', 'string', function (string $attribute, mixed $value, \Closure $fail): void {
                if (str_word_count((string) $value) > 300) {
                    $fail('The motivation response must not exceed 300 words.');
                }
            }],
            'institutional_benefit' => ['required', 'string', function (string $attribute, mixed $value, \Closure $fail): void {
                if (str_word_count((string) $value) > 300) {
                    $fail('The institutional benefit response must not exceed 300 words.');
                }
            }],
            'reach_commitment' => ['required', 'in:3,5,10,20,Above 20'],
            'passionate_issue' => ['required', 'string', function (string $attribute, mixed $value, \Closure $fail): void {
                if (str_word_count((string) $value) > 250) {
                    $fail('The passionate issue response must not exceed 250 words.');
                }
            }],
            'available_full_training' => ['required', 'boolean'],
            'willing_participate_discussions' => ['required', 'boolean'],
            'commit_tanzania_igf_2026' => ['required', 'boolean'],
            'require_accessibility_support' => ['nullable', 'boolean'],
            'require_travel_support' => ['nullable', 'boolean'],
            'require_accommodation_support' => ['nullable', 'boolean'],
            'data_protection_accepted' => ['accepted'],
            'declaration_confirmed' => ['accepted'],
        ]);

        $data['statement_of_interest'] = $data['motivation'];

        SchoolApplicant::create(array_merge($data, [
            'status' => 'submitted',
        ]));

        return redirect()
            ->route('school.application')
            ->with('status', 'Your application has been submitted successfully. We will contact you after the review process.');
    }
}
