<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TsigApplication extends Model
{
    protected $table = 'tsig_applications';

    protected $fillable = [
        'full_name',
        'gender',
        'date_of_birth',
        'nationality',
        'email',
        'phone',
        'organization',
        'current_occupation',
        'stakeholder_group',
        'stakeholder_other',
        'highest_education',
        'field_of_study',
        'region',
        'district',
        'previous_participation',
        'internet_governance_experience',
        'motivation',
        'institutional_benefit',
        'passionate_issue',
        'reach_commitment',
        'available_full_training',
        'willing_participate_discussions',
        'commit_tanzania_igf_2026',
        'require_accessibility_support',
        'data_protection_accepted',
        'declaration_confirmed',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'previous_participation' => 'array',
        'available_full_training' => 'boolean',
        'willing_participate_discussions' => 'boolean',
        'commit_tanzania_igf_2026' => 'boolean',
        'require_accessibility_support' => 'boolean',
        'data_protection_accepted' => 'boolean',
        'declaration_confirmed' => 'boolean',
    ];
}
