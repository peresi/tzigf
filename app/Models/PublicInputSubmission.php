<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicInputSubmission extends Model
{
    protected $fillable = [
        'submission_type',
        'full_name',
        'organization',
        'stakeholder_group',
        'country',
        'email',
        'whatsapp_number',
        'region',
        'thematic_areas',
        'priority_issues',
        'additional_input',
        'implementation_impact',
        'programme_design',
        'programme_design_additional',
        'intersessional_activities',
        'issue_title',
        'issue_description',
        'relevance_to_tanzania',
        'policy_questions',
        'stakeholders',
        'consent',
        'status',
    ];

    protected $casts = [
        'thematic_areas' => 'array',
        'programme_design' => 'array',
        'intersessional_activities' => 'array',
        'stakeholders' => 'array',
        'consent' => 'boolean',
    ];
}
