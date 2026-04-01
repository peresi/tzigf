<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionProposal extends Model
{
    protected $fillable = [
        'full_name',
        'organization',
        'country',
        'email',
        'session_title',
        'thematic_areas',
        'session_format',
        'session_description',
        'moderator_name',
        'moderator_organization',
        'moderator_email',
        'speaker_one',
        'speaker_two',
        'speaker_three',
        'stakeholder_groups',
        'expected_outcomes',
        'supporting_document_path',
        'supporting_document_name',
        'consent',
        'status',
    ];

    protected $casts = [
        'thematic_areas' => 'array',
        'stakeholder_groups' => 'array',
        'consent' => 'boolean',
    ];
}
