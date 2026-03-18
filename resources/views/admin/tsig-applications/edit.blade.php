@extends('admin.layout')

@section('content')
<div style="max-width: 900px;">
    <h1>TSIG Application Details</h1>

    <div style="display: grid; gap: 1.5rem;">
        <!-- Personal Information -->
        <div class="card">
            <h3 style="margin-top: 0;">Personal Information</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Full Name</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->full_name }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Email</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->email }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Gender</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->gender ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Date of Birth</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->date_of_birth?->format('M d, Y') ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Nationality</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->nationality ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Phone</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->phone ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Region</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->region ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">District</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->district ?? '—' }}</p>
                </div>
            </div>
        </div>

        <!-- Professional Background -->
        <div class="card">
            <h3 style="margin-top: 0;">Professional Background</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Current Occupation</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->current_occupation ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Organization</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->organization ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Stakeholder Group</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->stakeholder_group }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Highest Education</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->highest_education ?? '—' }}</p>
                </div>
                <div style="grid-column: 1 / -1;">
                    <p style="margin: 0; color: #888; font-size: .85rem;">Field of Study</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->field_of_study ?? '—' }}</p>
                </div>
            </div>
        </div>

        <!-- Experience & Motivation -->
        <div class="card">
            <h3 style="margin-top: 0;">Experience & Motivation</h3>
            <div style="display: grid; gap: 1rem;">
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Internet Governance Experience</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 400; line-height: 1.5;">{{ $tsig_application->internet_governance_experience ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Why participate in TzSIG 2026?</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 400; line-height: 1.5;">{{ $tsig_application->motivation ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">How will this benefit your institution/community?</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 400; line-height: 1.5;">{{ $tsig_application->institutional_benefit ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Passionate about (IG issue)</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 400; line-height: 1.5;">{{ $tsig_application->passionate_issue ?? '—' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Reach Commitment</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->reach_commitment ?? '—' }} people</p>
                </div>
            </div>
        </div>

        <!-- Commitment -->
        <div class="card">
            <h3 style="margin-top: 0;">Commitment</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem;">
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Available for full training</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->available_full_training ? '✓ Yes' : '✗ No' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Participate in discussions</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->willing_participate_discussions ? '✓ Yes' : '✗ No' }}</p>
                </div>
                <div>
                    <p style="margin: 0; color: #888; font-size: .85rem;">Attend Tanzania IGF 2026</p>
                    <p style="margin: 0.3rem 0 0; font-weight: 500;">{{ $tsig_application->commit_tanzania_igf_2026 ? '✓ Yes' : '✗ No' }}</p>
                </div>
            </div>
        </div>

        <!-- Status Update -->
        <div class="card">
            <h3 style="margin-top: 0;">Update Status</h3>
            <form method="POST" action="{{ route('admin.tsig-applications.update', $tsig_application) }}">
                @csrf
                @method('PUT')
                <div style="display: grid; grid-template-columns: 1fr auto; gap: 1rem; align-items: flex-end;">
                    <div>
                        <label for="status" style="display: block; font-weight: 600; margin-bottom: .35rem;">Application Status</label>
                        <select id="status" name="status" required style="width: 100%; border: 1px solid var(--line); border-radius: 10px; padding: .62rem .72rem; background: #fff;">
                            <option value="submitted" @selected($tsig_application->status === 'submitted')>Submitted</option>
                            <option value="under_review" @selected($tsig_application->status === 'under_review')>Under Review</option>
                            <option value="accepted" @selected($tsig_application->status === 'accepted')>Accepted</option>
                            <option value="rejected" @selected($tsig_application->status === 'rejected')>Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="padding: .62rem 1.5rem;">Update Status</button>
                </div>
            </form>
        </div>

        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.tsig-applications.index') }}" class="btn" style="border-color: var(--line);">← Back to TSIG Applications</a>
        </div>
    </div>
</div>
@endsection
