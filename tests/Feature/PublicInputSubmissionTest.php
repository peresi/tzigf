<?php

namespace Tests\Feature;

use App\Models\PublicInputSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PublicInputSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_input_submission_is_stored_with_full_schema(): void
    {
        $response = $this->post(route('public-input.submit'), $this->validPayload());

        $response->assertRedirect(route('public-input.index'));

        $this->assertDatabaseHas('public_input_submissions', [
            'full_name' => 'Test Person',
            'email' => 'test@example.com',
            'submission_type' => 'Individual',
            'region' => 'Dar es Salaam',
            'status' => 'submitted',
        ]);

        $submission = PublicInputSubmission::query()->firstOrFail();

        $this->assertSame(['Government'], $submission->stakeholders);
        $this->assertSame(
            ['Artificial Intelligence & Emerging Technologies Governance'],
            $submission->thematic_areas
        );
    }

    public function test_public_input_submission_is_stored_with_legacy_schema_without_failing(): void
    {
        Schema::table('public_input_submissions', function ($table): void {
            $table->dropColumn([
                'submission_type',
                'stakeholder_group',
                'whatsapp_number',
                'region',
                'thematic_areas',
                'priority_issues',
                'additional_input',
                'implementation_impact',
                'programme_design',
                'programme_design_additional',
                'intersessional_activities',
            ]);
        });

        $response = $this->post(route('public-input.submit'), $this->validPayload());

        $response->assertRedirect(route('public-input.index'));

        $this->assertDatabaseHas('public_input_submissions', [
            'full_name' => 'Test Person',
            'email' => 'test@example.com',
            'country' => 'Tanzania',
            'status' => 'submitted',
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validPayload(): array
    {
        return [
            'submission_type' => 'Individual',
            'full_name' => 'Test Person',
            'organization' => 'Example Org',
            'stakeholder_group' => 'Government',
            'email' => 'test@example.com',
            'whatsapp_number' => '+255700000000',
            'region' => 'Dar es Salaam',
            'thematic_areas' => ['Artificial Intelligence & Emerging Technologies Governance'],
            'priority_issues' => 'Priority issue details for the forum agenda.',
            'additional_input' => 'Additional emerging issue details.',
            'implementation_impact' => 'Implementation impact guidance.',
            'programme_design' => ['Workshops'],
            'programme_design_additional' => 'Extra format suggestion.',
            'intersessional_activities' => ['Policy dialogues'],
            'consent' => '1',
        ];
    }
}
