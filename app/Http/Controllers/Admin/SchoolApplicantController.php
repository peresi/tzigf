<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolApplicant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class SchoolApplicantController extends Controller
{
    public function index(Request $request): View
    {
        $query = SchoolApplicant::query();
        $this->applyFilters($query, $request);

        return view('admin.school-applicants.index', [
            'applicants' => $query->latest()->paginate(20)->withQueryString(),
            'filters' => [
                'q' => (string) $request->query('q', ''),
                'status' => (string) $request->query('status', ''),
                'from_date' => (string) $request->query('from_date', ''),
                'to_date' => (string) $request->query('to_date', ''),
            ],
        ]);
    }

    public function edit(SchoolApplicant $school_applicant): View
    {
        return view('admin.school-applicants.edit', [
            'applicant' => $school_applicant,
        ]);
    }

    public function update(Request $request, SchoolApplicant $school_applicant): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female,Prefer not to say'],
            'date_of_birth' => ['required', 'date'],
            'nationality' => ['required', 'string', 'max:120'],
            'district' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:40'],
            'current_occupation' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'stakeholder_group' => ['required', 'string', 'max:100'],
            'stakeholder_other' => ['nullable', 'required_if:stakeholder_group,Other', 'string', 'max:255'],
            'highest_education' => ['required', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:150'],
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
            'data_protection_accepted' => ['nullable', 'boolean'],
            'declaration_confirmed' => ['required', 'boolean'],
            'signature' => ['required', 'string', 'max:255'],
            'declaration_date' => ['required', 'date'],
            'status' => ['required', 'in:submitted,under_review,accepted,waitlisted,rejected'],
        ]);

        $data['statement_of_interest'] = $data['motivation'];

        $school_applicant->update($data);

        return redirect()->route('admin.school-applicants.index')->with('status', 'Applicant updated successfully.');
    }

    public function destroy(SchoolApplicant $school_applicant): RedirectResponse
    {
        $school_applicant->delete();

        return redirect()->route('admin.school-applicants.index')->with('status', 'Applicant deleted successfully.');
    }

    public function exportCsv(Request $request)
    {
        $filename = 'school-applicants-'.now()->format('Ymd_His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $query = SchoolApplicant::query();
        $this->applyFilters($query, $request);

        $callback = static function () use ($query): void {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'ID',
                'Full Name',
                'Gender',
                'Date of Birth',
                'Nationality',
                'Email',
                'Phone',
                'Region',
                'District',
                'Current Occupation',
                'Organization',
                'Stakeholder Category',
                'Stakeholder Other',
                'Highest Education',
                'Field of Study',
                'Previous Participation',
                'Internet Governance Experience',
                'Motivation',
                'Institutional/Community Benefit',
                'Passionate Issue',
                'Available Full Training',
                'Willing Group Work',
                'Commit Tanzania IGF 2026',
                'Need Accessibility Support',
                'Need Travel Support',
                'Need Accommodation Support',
                'Data Protection Accepted',
                'Declaration Confirmed',
                'Signature',
                'Declaration Date',
                'Status',
                'Submitted At',
            ]);

            $query
                ->latest()
                ->chunk(200, static function ($applicants) use ($handle): void {
                    foreach ($applicants as $applicant) {
                        fputcsv($handle, [
                            $applicant->id,
                            $applicant->full_name,
                            $applicant->gender,
                            optional($applicant->date_of_birth)->format('Y-m-d'),
                            $applicant->nationality,
                            $applicant->email,
                            $applicant->phone,
                            $applicant->region,
                            $applicant->district,
                            $applicant->current_occupation,
                            $applicant->organization,
                            $applicant->stakeholder_group,
                            $applicant->stakeholder_other,
                            $applicant->highest_education,
                            $applicant->field_of_study,
                            implode(' | ', $applicant->previous_participation ?? []),
                            preg_replace('/\s+/', ' ', (string) $applicant->internet_governance_experience),
                            preg_replace('/\s+/', ' ', (string) $applicant->motivation),
                            preg_replace('/\s+/', ' ', (string) $applicant->institutional_benefit),
                            preg_replace('/\s+/', ' ', (string) $applicant->passionate_issue),
                            $applicant->available_full_training ? 'Yes' : 'No',
                            $applicant->willing_participate_discussions ? 'Yes' : 'No',
                            $applicant->commit_tanzania_igf_2026 ? 'Yes' : 'No',
                            is_null($applicant->require_accessibility_support) ? '' : ($applicant->require_accessibility_support ? 'Yes' : 'No'),
                            is_null($applicant->require_travel_support) ? '' : ($applicant->require_travel_support ? 'Yes' : 'No'),
                            is_null($applicant->require_accommodation_support) ? '' : ($applicant->require_accommodation_support ? 'Yes' : 'No'),
                            $applicant->data_protection_accepted ? 'Yes' : 'No',
                            $applicant->declaration_confirmed ? 'Yes' : 'No',
                            $applicant->signature,
                            optional($applicant->declaration_date)->format('Y-m-d'),
                            $applicant->status,
                            optional($applicant->created_at)->format('Y-m-d H:i:s'),
                        ]);
                    }
                });

            fclose($handle);
        };

        return Response::stream($callback, 200, $headers);
    }

    private function applyFilters(Builder $query, Request $request): void
    {
        if ($request->filled('q')) {
            $term = trim((string) $request->query('q'));
            $query->where(function (Builder $subQuery) use ($term): void {
                $subQuery->where('full_name', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%")
                    ->orWhere('current_occupation', 'like', "%{$term}%")
                    ->orWhere('organization', 'like', "%{$term}%")
                    ->orWhere('region', 'like', "%{$term}%")
                    ->orWhere('district', 'like', "%{$term}%")
                    ->orWhere('stakeholder_group', 'like', "%{$term}%")
                    ->orWhere('nationality', 'like', "%{$term}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', (string) $request->query('status'));
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', (string) $request->query('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', (string) $request->query('to_date'));
        }
    }
}
