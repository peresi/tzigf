<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TsigApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TsigApplicationController extends Controller
{
    public function index(): View
    {
        $tsig_applications = TsigApplication::paginate(25);
        return view('admin.tsig-applications.index', compact('tsig_applications'));
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

    public function exportCsv(): StreamedResponse
    {
        $tsig_applications = TsigApplication::all();

        $filename = 'tsig_applications_' . now()->format('Y-m-d_His') . '.csv';

        return response()->stream(function () use ($tsig_applications) {
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

            foreach ($tsig_applications as $application) {
                fputcsv($file, [
                    $application->id,
                    $application->full_name,
                    $application->email,
                    $application->phone,
                    $application->gender,
                    $application->date_of_birth,
                    $application->nationality,
                    $application->region,
                    $application->district,
                    $application->organization,
                    $application->current_occupation,
                    $application->stakeholder_group,
                    $application->highest_education,
                    $application->field_of_study,
                    $application->internet_governance_experience,
                    $application->motivation,
                    $application->institutional_benefit,
                    $application->passionate_issue,
                    $application->reach_commitment,
                    $application->available_full_training ? 'Yes' : 'No',
                    $application->willing_participate_discussions ? 'Yes' : 'No',
                    $application->commit_tanzania_igf_2026 ? 'Yes' : 'No',
                    $application->require_accessibility_support ? 'Yes' : 'No',
                    $application->status,
                    $application->created_at,
                ]);
            }

            fclose($file);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
