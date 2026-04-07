<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TsigApplication;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TsigApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $query = TsigApplication::query();
        $this->applyFilters($query, $request);

        return view('admin.tsig-applications.index', [
            'applications' => $query->latest()->paginate(20)->withQueryString(),
            'filters' => [
                'q' => (string) $request->query('q', ''),
                'status' => (string) $request->query('status', ''),
                'from_date' => (string) $request->query('from_date', ''),
                'to_date' => (string) $request->query('to_date', ''),
            ],
        ]);
    }

    public function edit(TsigApplication $tsig_application): View
    {
        return view('admin.tsig-applications.edit', compact('tsig_application'));
    }

    public function update(Request $request, TsigApplication $tsig_application): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:submitted,under_review,accepted,rejected'],
        ]);

        $tsig_application->update($data);

        return redirect()
            ->route('admin.tsig-applications.index')
            ->with('success', 'TSIG application status updated.');
    }

    public function destroy(TsigApplication $tsig_application): RedirectResponse
    {
        $tsig_application->delete();

        return redirect()
            ->route('admin.tsig-applications.index')
            ->with('success', 'TSIG application deleted.');
    }

    public function exportCsv(Request $request): StreamedResponse
    {
        $query = TsigApplication::query();
        $this->applyFilters($query, $request);

        $filename = 'tsig_applications_' . now()->format('Y-m-d_His') . '.csv';

        return response()->stream(function () use ($query) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID',
                'Full Name',
                'Email',
                'Phone',
                'Gender',
                'Date of Birth',
                'Nationality',
                'Region',
                'District',
                'Organization',
                'Current Occupation',
                'Stakeholder Group',
                'Highest Education',
                'Field of Study',
                'Internet Governance Experience',
                'Motivation',
                'Institutional Benefit',
                'Passionate Issue',
                'Reach Commitment',
                'Available Full Training',
                'Participate Discussions',
                'Commit Tanzania IGF 2026',
                'Require Accessibility Support',
                'Status',
                'Created At',
            ]);

            $query->latest()->chunk(200, static function ($applications) use ($file): void {
                foreach ($applications as $application) {
                    fputcsv($file, [
                        $application->id,
                        $application->full_name,
                        $application->email,
                        $application->phone,
                        $application->gender,
                        optional($application->date_of_birth)->format('Y-m-d'),
                        $application->nationality,
                        $application->region,
                        $application->district,
                        $application->organization,
                        $application->current_occupation,
                        $application->stakeholder_group,
                        $application->highest_education,
                        $application->field_of_study,
                        preg_replace('/\s+/', ' ', (string) $application->internet_governance_experience),
                        preg_replace('/\s+/', ' ', (string) $application->motivation),
                        preg_replace('/\s+/', ' ', (string) $application->institutional_benefit),
                        preg_replace('/\s+/', ' ', (string) $application->passionate_issue),
                        $application->reach_commitment,
                        $application->available_full_training ? 'Yes' : 'No',
                        $application->willing_participate_discussions ? 'Yes' : 'No',
                        $application->commit_tanzania_igf_2026 ? 'Yes' : 'No',
                        is_null($application->require_accessibility_support) ? '' : ($application->require_accessibility_support ? 'Yes' : 'No'),
                        $application->status,
                        optional($application->created_at)->format('Y-m-d H:i:s'),
                    ]);
                }
            });

            fclose($file);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

    private function applyFilters(Builder $query, Request $request): void
    {
        if ($request->filled('q')) {
            $term = trim((string) $request->query('q'));
            $query->where(function (Builder $subQuery) use ($term): void {
                $subQuery->where('full_name', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%")
                    ->orWhere('organization', 'like', "%{$term}%")
                    ->orWhere('current_occupation', 'like', "%{$term}%")
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
