<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicInputSubmission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class PublicInputSubmissionController extends Controller
{
    public function index(Request $request): View
    {
        $query = PublicInputSubmission::query();
        $this->applyFilters($query, $request);

        return view('admin.public-input-submissions.index', [
            'submissions' => $query->latest()->paginate(20)->withQueryString(),
            'filters' => [
                'q' => (string) $request->query('q', ''),
                'status' => (string) $request->query('status', ''),
                'from_date' => (string) $request->query('from_date', ''),
                'to_date' => (string) $request->query('to_date', ''),
            ],
        ]);
    }

    public function edit(PublicInputSubmission $public_input_submission): View
    {
        return view('admin.public-input-submissions.edit', [
            'submission' => $public_input_submission,
        ]);
    }

    public function update(Request $request, PublicInputSubmission $public_input_submission): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:submitted,under_review,incorporated,archived'],
        ]);

        $public_input_submission->update($data);

        return redirect()
            ->route('admin.public-input-submissions.index')
            ->with('status', 'Public input submission updated successfully.');
    }

    public function destroy(PublicInputSubmission $public_input_submission): RedirectResponse
    {
        $public_input_submission->delete();

        return redirect()
            ->route('admin.public-input-submissions.index')
            ->with('status', 'Public input submission deleted successfully.');
    }

    public function exportCsv(Request $request)
    {
        $filename = 'public-input-submissions-'.now()->format('Ymd_His').'.csv';
        $query = PublicInputSubmission::query();
        $this->applyFilters($query, $request);

        $callback = static function () use ($query): void {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'ID',
                'Submission Type',
                'Full Name',
                'Organization',
                'Stakeholder Group',
                'Country',
                'Email',
                'WhatsApp Number',
                'Region',
                'Thematic Areas',
                'Priority Issues',
                'Additional Input',
                'Implementation & Impact',
                'Programme Design',
                'Programme Design Additional',
                'Intersessional Activities',
                'Issue Title',
                'Issue Description',
                'Relevance to Tanzania',
                'Policy Questions',
                'Stakeholders',
                'Consent',
                'Status',
                'Submitted At',
            ]);

            $query->latest()->chunk(200, static function ($rows) use ($handle): void {
                foreach ($rows as $submission) {
                    fputcsv($handle, [
                        $submission->id,
                        $submission->submission_type,
                        $submission->full_name,
                        $submission->organization,
                        $submission->stakeholder_group,
                        $submission->country,
                        $submission->email,
                        $submission->whatsapp_number,
                        $submission->region,
                        implode(' | ', $submission->thematic_areas ?? []),
                        preg_replace('/\s+/', ' ', (string) $submission->priority_issues),
                        preg_replace('/\s+/', ' ', (string) $submission->additional_input),
                        preg_replace('/\s+/', ' ', (string) $submission->implementation_impact),
                        implode(' | ', $submission->programme_design ?? []),
                        preg_replace('/\s+/', ' ', (string) $submission->programme_design_additional),
                        implode(' | ', $submission->intersessional_activities ?? []),
                        $submission->issue_title,
                        preg_replace('/\s+/', ' ', (string) $submission->issue_description),
                        preg_replace('/\s+/', ' ', (string) $submission->relevance_to_tanzania),
                        preg_replace('/\s+/', ' ', (string) $submission->policy_questions),
                        implode(' | ', $submission->stakeholders ?? []),
                        $submission->consent ? 'Yes' : 'No',
                        $submission->status,
                        optional($submission->created_at)->format('Y-m-d H:i:s'),
                    ]);
                }
            });

            fclose($handle);
        };

        return Response::stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
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
                    ->orWhere('country', 'like', "%{$term}%")
                    ->orWhere('issue_title', 'like', "%{$term}%");
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
