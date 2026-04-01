<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicInputSubmission extends Model
{
    protected $fillable = [
        'full_name',
        'organization',
        'country',
        'email',
        'issue_title',
        'issue_description',
        'relevance_to_tanzania',
        'policy_questions',
        'stakeholders',
        'consent',
        'status',
    ];

    protected $casts = [
        'stakeholders' => 'array',
        'consent' => 'boolean',
    ];
}
