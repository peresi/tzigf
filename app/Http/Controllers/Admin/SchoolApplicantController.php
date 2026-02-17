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
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'organization' => ['nullable', 'string', 'max:255'],
            'stakeholder_group' => ['required', 'string', 'max:100'],
            'region' => ['nullable', 'string', 'max:150'],
            'statement_of_interest' => ['required', 'string', 'min:50', 'max:3000'],
            'status' => ['required', 'in:submitted,under_review,accepted,waitlisted,rejected'],
        ]);

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
                'Email',
                'Phone',
                'Organization',
                'Stakeholder Group',
                'Region',
                'Status',
                'Statement of Interest',
                'Submitted At',
            ]);

            $query
                ->latest()
                ->chunk(200, static function ($applicants) use ($handle): void {
                    foreach ($applicants as $applicant) {
                        fputcsv($handle, [
                            $applicant->id,
                            $applicant->full_name,
                            $applicant->email,
                            $applicant->phone,
                            $applicant->organization,
                            $applicant->stakeholder_group,
                            $applicant->region,
                            $applicant->status,
                            preg_replace('/\s+/', ' ', (string) $applicant->statement_of_interest),
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
                    ->orWhere('organization', 'like', "%{$term}%")
                    ->orWhere('region', 'like', "%{$term}%");
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
