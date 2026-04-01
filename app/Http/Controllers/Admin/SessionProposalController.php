<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SessionProposal;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SessionProposalController extends Controller
{
    public function index(Request $request): View
    {
        $query = SessionProposal::query();
        $this->applyFilters($query, $request);

        return view('admin.session-proposals.index', [
            'proposals' => $query->latest()->paginate(20)->withQueryString(),
            'filters' => [
                'q' => (string) $request->query('q', ''),
                'status' => (string) $request->query('status', ''),
                'from_date' => (string) $request->query('from_date', ''),
                'to_date' => (string) $request->query('to_date', ''),
            ],
        ]);
    }

    public function edit(SessionProposal $session_proposal): View
    {
        return view('admin.session-proposals.edit', [
            'proposal' => $session_proposal,
        ]);
    }

    public function update(Request $request, SessionProposal $session_proposal): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:submitted,under_review,approved,rejected'],
        ]);

        $session_proposal->update($data);

        return redirect()
            ->route('admin.session-proposals.index')
            ->with('status', 'Session proposal updated successfully.');
    }

    public function destroy(SessionProposal $session_proposal): RedirectResponse
    {
        if ($session_proposal->supporting_document_path && Storage::exists($session_proposal->supporting_document_path)) {
            Storage::delete($session_proposal->supporting_document_path);
        }

        $session_proposal->delete();

        return redirect()
            ->route('admin.session-proposals.index')
            ->with('status', 'Session proposal deleted successfully.');
    }

    public function exportCsv(Request $request)
    {
        $filename = 'session-proposals-'.now()->format('Ymd_His').'.csv';
        $query = SessionProposal::query();
        $this->applyFilters($query, $request);

        $callback = static function () use ($query): void {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'ID',
                'Full Name',
                'Organization',
                'Country',
                'Email',
                'Session Title',
                'Thematic Areas',
                'Session Format',
                'Session Description',
                'Moderator Name',
                'Moderator Organization',
                'Moderator Email',
                'Speaker 1',
                'Speaker 2',
                'Speaker 3',
                'Stakeholder Groups',
                'Expected Outcomes',
                'Supporting Document',
                'Consent',
                'Status',
                'Submitted At',
            ]);

            $query->latest()->chunk(200, static function ($rows) use ($handle): void {
                foreach ($rows as $proposal) {
                    fputcsv($handle, [
                        $proposal->id,
                        $proposal->full_name,
                        $proposal->organization,
                        $proposal->country,
                        $proposal->email,
                        $proposal->session_title,
                        implode(' | ', $proposal->thematic_areas ?? []),
                        $proposal->session_format,
                        preg_replace('/\s+/', ' ', (string) $proposal->session_description),
                        $proposal->moderator_name,
                        $proposal->moderator_organization,
                        $proposal->moderator_email,
                        $proposal->speaker_one,
                        $proposal->speaker_two,
                        $proposal->speaker_three,
                        implode(' | ', $proposal->stakeholder_groups ?? []),
                        preg_replace('/\s+/', ' ', (string) $proposal->expected_outcomes),
                        $proposal->supporting_document_name,
                        $proposal->consent ? 'Yes' : 'No',
                        $proposal->status,
                        optional($proposal->created_at)->format('Y-m-d H:i:s'),
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

    public function downloadSupportingDocument(SessionProposal $session_proposal): StreamedResponse
    {
        abort_unless(
            $session_proposal->supporting_document_path && Storage::exists($session_proposal->supporting_document_path),
            404
        );

        return Storage::download(
            $session_proposal->supporting_document_path,
            $session_proposal->supporting_document_name ?? basename($session_proposal->supporting_document_path)
        );
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
                    ->orWhere('session_title', 'like', "%{$term}%")
                    ->orWhere('moderator_name', 'like', "%{$term}%");
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
